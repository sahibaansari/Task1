<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactAdminController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();
        
        // Filter by status if provided
        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }
        
        // Search functionality
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('fullname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('business_name', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }
        
        $contacts = $query->orderBy('created_at', 'desc')->paginate(10);
        
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        // Auto-mark as read when viewing
        if ($contact->status == 'pending') {
            $contact->status = 'read';
            $contact->save();
        }
        
        return view('admin.contacts.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);
        
        $validated = $request->validate([
            'status' => 'required|in:pending,read,replied',
            'notes' => 'nullable|string'
        ]);

        $contact->update([
            'status' => $validated['status'],
            'notes' => $validated['notes'] ?? $contact->notes
        ]);

        return redirect()->route('admin.contacts.index')->with('success', 'Contact updated successfully');
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        
        // Delete associated file
        if ($contact->file_path) {
            Storage::disk('public')->delete($contact->file_path);
        }
        
        $contact->delete();
        
        return redirect()->route('admin.contacts.index')->with('success', 'Contact deleted successfully');
    }
}
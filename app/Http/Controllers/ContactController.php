<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'fullname' => 'required|string|max:100',
            'business' => 'nullable|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'nullable|string|max:20',
            'file' => 'nullable|file|max:2048', // 2MB max
            'message' => 'required|string'
        ]);

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('contact_files', 'public');
        }

        // Create contact record
        Contact::create([
            'fullname' => $validated['fullname'],
            'business_name' => $validated['business'] ?? null,
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'file_path' => $filePath,
            'message' => $validated['message'],
            'status' => 'pending'
        ]);

        // Redirect back with success message
        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
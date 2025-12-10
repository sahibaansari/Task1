<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Client-side validation rules
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string|min:2|max:100',
            'business' => 'nullable|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|regex:/^[0-9\-\+\s\(\)]{10,20}$/',
            'file' => 'nullable|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048', // 2MB max
            'message' => 'required|string|min:10|max:1000'
        ], [
            'fullname.required' => 'Please enter your full name.',
            'fullname.min' => 'Name must be at least 2 characters.',
            'fullname.max' => 'Name cannot exceed 100 characters.',
            'email.required' => 'Please enter your email address.',
            'email.email' => 'Please enter a valid email address.',
            'phone.regex' => 'Please enter a valid phone number.',
            'file.mimes' => 'Only PDF, Word, JPG, PNG files are allowed.',
            'file.max' => 'File size must be less than 2MB.',
            'message.required' => 'Please enter your message.',
            'message.min' => 'Message must be at least 10 characters.',
            'message.max' => 'Message cannot exceed 1000 characters.'
        ]);

        // If validation fails, return with errors
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput(); // Keep old input values
        }

        // Handle file upload
        $filePath = null;
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = $file->storeAs('contact_files', $fileName, 'public');
        }

        // Create contact record
        $contact = Contact::create([
            'fullname' => $request->fullname,
            'business_name' => $request->business,
            'email' => $request->email,
            'phone' => $request->phone,
            'file_path' => $filePath,
            'message' => $request->message,
            'status' => 'pending'
        ]);

        // Return success response
        return redirect()->back()->with([
            'success' => 'Your message has been sent successfully! We will contact you soon.',
            'contact_id' => $contact->id
        ]);
    }
}
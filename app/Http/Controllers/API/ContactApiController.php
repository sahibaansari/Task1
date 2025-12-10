<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContactApiController extends Controller
{
    // GET /api/contacts - List all contacts
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $contacts
        ]);
    }

    // GET /api/contacts/{id} - Show single contact
    public function show($id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found'
            ], 404);
        }
        
        return response()->json([
            'success' => true,
            'data' => $contact
        ]);
    }

  public function store(Request $request)
{
    
    
    $validator = Validator::make($request->all(), [
        'fullname' => 'required|string|max:100',
        'business_name' => 'nullable|string|max:100',
        'email' => 'required|email|max:100',
        'phone' => 'nullable|string|max:20',
        'message' => 'required|string'
    ]);

    if ($validator->fails()) {
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);
    }

    $contact = Contact::create([
        'fullname' => $request->fullname,
        'business_name' => $request->business_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'message' => $request->message,
        'status' => 'pending'
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Contact created successfully',
        'data' => $contact
    ], 201);
}

    // PUT /api/contacts/{id} - Update contact
    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'fullname' => 'sometimes|string|max:100',
            'business_name' => 'nullable|string|max:100',
            'email' => 'sometimes|email|max:100',
            'phone' => 'nullable|string|max:20',
            'message' => 'sometimes|string',
            'status' => 'sometimes|in:pending,read,replied'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        $contact->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Contact updated successfully',
            'data' => $contact
        ]);
    }

    // DELETE /api/contacts/{id} - Delete contact
    public function destroy($id)
    {
        $contact = Contact::find($id);
        
        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'Contact not found'
            ], 404);
        }

        $contact->delete();

        return response()->json([
            'success' => true,
            'message' => 'Contact deleted successfully'
        ]);
    }
}
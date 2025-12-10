@extends('layouts.simple')

@section('page-title', 'Contact Details')

@section('content')
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Message #{{ $contact->id }}</h6>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Full Name:</strong> {{ $contact->fullname }}</p>
                <p><strong>Business Name:</strong> {{ $contact->business_name ?? '-' }}</p>
                <p><strong>Email:</strong> {{ $contact->email }}</p>
                <p><strong>Phone:</strong> {{ $contact->phone ?? '-' }}</p>
            </div>
            <div class="col-md-6">
                <p><strong>Status:</strong> 
                    <span class="badge badge-{{ $contact->status === 'replied' ? 'success' : ($contact->status === 'read' ? 'info' : 'warning') }}">
                        {{ ucfirst($contact->status) }}
                    </span>
                </p>
                <p><strong>Submitted:</strong> {{ $contact->created_at->format('d/m/Y H:i') }}</p>
                
                @if($contact->file_path)
                <p><strong>Attachment:</strong> 
                    <a href="{{ Storage::url($contact->file_path) }}" target="_blank" class="btn btn-sm btn-info">
                        <i class="fas fa-download mr-1"></i> Download File
                    </a>
                </p>
                @endif
            </div>
        </div>
        
        <hr>
        
        <div class="mt-4">
            <h5>Message:</h5>
            <div class="p-3 bg-light rounded">
                {{ $contact->message }}
            </div>
        </div>
        
        @if($contact->notes)
        <div class="mt-4">
            <h5>Admin Notes:</h5>
            <div class="p-3 bg-light rounded">
                {{ $contact->notes }}
            </div>
        </div>
        @endif
        
        <div class="mt-4">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-1"></i> Back to List
            </a>
            <a href="{{ route('admin.contacts.edit', $contact->id) }}" class="btn btn-warning">
                <i class="fas fa-edit mr-1"></i> Edit Status
            </a>
            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Delete this message?')">
                    <i class="fas fa-trash mr-1"></i> Delete
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
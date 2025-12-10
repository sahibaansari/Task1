<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Contact - Admin</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fc;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.15);
            margin-bottom: 20px;
        }
        .badge-status {
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 0.9em;
        }
        .badge-pending { background-color: #ffc107; color: #212529; }
        .badge-read { background-color: #17a2b8; color: white; }
        .badge-replied { background-color: #28a745; color: white; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h1 class="h3 mb-0">Edit Contact Status</h1>
                <p class="text-muted mb-0">ID: #{{ $contact->id }}</p>
            </div>
            <div>
                <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-secondary btn-sm">
                    <i class="fas fa-arrow-left"></i> Back to Details
                </a>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-info btn-sm">
                    All Messages
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">
                    <span>&times;</span>
                </button>
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Form -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Update Contact Status</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Current Status Display -->
                    <div class="form-group">
                        <label class="font-weight-bold">Current Status</label>
                        <div>
                            @if($contact->status == 'pending')
                                <span class="badge-status badge-pending">Pending</span>
                            @elseif($contact->status == 'read')
                                <span class="badge-status badge-read">Read</span>
                            @else
                                <span class="badge-status badge-replied">Replied</span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Status Selection -->
                    <div class="form-group">
                        <label for="status" class="font-weight-bold">New Status</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="pending" {{ $contact->status == 'pending' ? 'selected' : '' }}>
                                ⏳ Pending
                            </option>
                            <option value="read" {{ $contact->status == 'read' ? 'selected' : '' }}>
                                👁️ Read
                            </option>
                            <option value="replied" {{ $contact->status == 'replied' ? 'selected' : '' }}>
                                ✅ Replied
                            </option>
                        </select>
                        <small class="form-text text-muted">
                            Update the status of this contact message.
                        </small>
                    </div>
                    
                    <!-- Admin Notes -->
                    <div class="form-group">
                        <label for="notes" class="font-weight-bold">Admin Notes</label>
                        <textarea name="notes" id="notes" class="form-control" rows="4" 
                                  placeholder="Add internal notes about this contact...">{{ old('notes', $contact->notes ?? '') }}</textarea>
                        <small class="form-text text-muted">
                            These notes are only visible to admins. You can add follow-up information here.
                        </small>
                    </div>
                    
                    <!-- Submit Buttons -->
                    <div class="d-flex justify-content-between mt-4">
                        <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-secondary">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Update Contact
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Contact Information -->
        <div class="card">
            <div class="card-header bg-white">
                <h5 class="mb-0">Contact Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Full Name:</strong> {{ $contact->fullname }}</p>
                        <p><strong>Email:</strong> 
                            <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                        </p>
                        <p><strong>Phone:</strong> {{ $contact->phone ?? 'Not provided' }}</p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Business:</strong> {{ $contact->business_name ?? 'Not provided' }}</p>
                        <p><strong>Submitted:</strong> {{ $contact->created_at->format('F d, Y \a\t h:i A') }}</p>
                        <p><strong>Last Updated:</strong> {{ $contact->updated_at->format('F d, Y \a\t h:i A') }}</p>
                    </div>
                </div>
                
                <div class="mt-3">
                    <p class="font-weight-bold mb-2">Message:</p>
                    <div class="p-3 bg-light rounded">
                        {{ $contact->message }}
                    </div>
                </div>
                
                @if($contact->file_path)
                <div class="mt-3">
                    <p class="font-weight-bold mb-2">Attachment:</p>
                    <a href="{{ Storage::url($contact->file_path) }}" 
                       target="_blank" 
                       class="btn btn-sm btn-info">
                        <i class="fas fa-download"></i> Download File
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <script>
        // Auto-focus on status dropdown
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('status').focus();
        });
        
        // Confirm before leaving if changes were made
        window.addEventListener('beforeunload', function (e) {
            const form = document.querySelector('form');
            if (form && form.checkValidity()) {
                e.preventDefault();
                e.returnValue = 'You have unsaved changes. Are you sure you want to leave?';
            }
        });
    </script>
</body>
</html>
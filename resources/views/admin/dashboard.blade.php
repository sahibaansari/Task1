<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .sidebar {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            position: fixed;
            width: 250px;
            box-shadow: 3px 0 10px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 12px 20px;
            margin: 5px 15px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background: rgba(255,255,255,0.1);
            color: white;
        }
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .stat-card:hover {
            transform: translateY(-5px);
        }
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
        }
        .header-bar {
            background: white;
            padding: 15px 25px;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="p-4">
            <h3 class="mb-4">
                <i class="fas fa-shipping-fast me-2"></i> ShipX Admin
            </h3>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                        <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.contacts.index') }}" class="nav-link">
                        <i class="fas fa-envelope me-2"></i> Contact Messages
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/" class="nav-link" target="_blank">
                        <i class="fas fa-external-link-alt me-2"></i> View Website
                    </a>
                </li>
                <li class="nav-item mt-4">
                    <div class="nav-link">
                        <small class="text-white-50">Admin Panel v1.0</small>
                    </div>
                </li>
            </ul>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <div class="header-bar d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Dashboard Overview</h4>
            <div class="d-flex align-items-center">
                <span class="me-3 text-muted">
                    <i class="fas fa-calendar-alt me-1"></i> {{ now()->format('F d, Y') }}
                </span>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Total Messages</h6>
                            <h2 class="mb-0">{{ $totalContacts }}</h2>
                        </div>
                        <div class="stat-icon" style="background: rgba(102, 126, 234, 0.1); color: #667eea;">
                            <i class="fas fa-inbox"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.contacts.index') }}" class="text-decoration-none">
                            View All <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Pending</h6>
                            <h2 class="mb-0">{{ $pendingContacts }}</h2>
                        </div>
                        <div class="stat-icon" style="background: rgba(255, 193, 7, 0.1); color: #ffc107;">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.contacts.index') }}?status=pending" class="text-decoration-none">
                            Review <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted">Replied</h6>
                            <h2 class="mb-0">{{ $repliedContacts }}</h2>
                        </div>
                        <div class="stat-icon" style="background: rgba(40, 167, 69, 0.1); color: #28a745;">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('admin.contacts.index') }}?status=replied" class="text-decoration-none">
                            View <i class="fas fa-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="row">
            <div class="col-12">
                <div class="stat-card">
                    <h5>Quick Actions</h5>
                    <div class="row mt-3">
                        <div class="col-md-3">
                            <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary w-100 mb-2">
                                <i class="fas fa-list me-2"></i> View Messages
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('admin.contacts.index') }}?status=pending" class="btn btn-warning w-100 mb-2">
                                <i class="fas fa-clock me-2"></i> Pending Messages
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="/" class="btn btn-success w-100 mb-2" target="_blank">
                                <i class="fas fa-eye me-2"></i> View Website
                            </a>
                        </div>
                        <div class="col-md-3">
                            <button class="btn btn-info w-100 mb-2" onclick="location.reload()">
                                <i class="fas fa-sync-alt me-2"></i> Refresh
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Messages -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5>Recent Messages</h5>
                        <a href="{{ route('admin.contacts.index') }}" class="btn btn-sm btn-outline-primary">
                            View All
                        </a>
                    </div>
                    @php
                        $recentContacts = \App\Models\Contact::orderBy('created_at', 'desc')->take(5)->get();
                    @endphp
                    
                    @if($recentContacts->count() > 0)
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message Preview</th>
                                    <th>Status</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentContacts as $contact)
                                <tr>
                                    <td>{{ $contact->fullname }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>
                                        <small class="text-muted">
                                            {{ Str::limit($contact->message, 50) }}
                                        </small>
                                    </td>
                                    <td>
                                        @if($contact->status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @elseif($contact->status == 'read')
                                            <span class="badge bg-info">Read</span>
                                        @else
                                            <span class="badge bg-success">Replied</span>
                                        @endif
                                    </td>
                                    <td>{{ $contact->created_at->format('M d, Y') }}</td>
                                    <td>
                                        <a href="{{ route('admin.contacts.show', $contact->id) }}" 
                                           class="btn btn-sm btn-outline-primary">
                                            View
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="text-center py-4">
                        <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                        <p class="text-muted">No messages yet</p>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="mt-4 text-center text-muted">
            <small>ShipX Admin Panel &copy; {{ date('Y') }} | Simple Admin Access</small>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Simple logout function (if you want to add a logout button later)
        function logout() {
            if (confirm('Are you sure you want to exit admin panel?')) {
                // Just redirect to homepage since no authentication
                window.location.href = '/';
            }
        }
    </script>
</body>
</html>
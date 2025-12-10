<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - @yield('title')</title>
    <!-- Bootstrap 4 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body { background-color: #f8f9fc; padding-top: 20px; }
        .container-fluid { padding: 0 15px; }
    </style>
</head>
<body>
    <!-- Simple Header -->
    <div class="container-fluid mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="h3 mb-0">@yield('page-title')</h1>
            <div>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary btn-sm">
                    ← Back to Messages
                </a>
                <a href="{{ route('admin.dashboard') }}" class="btn btn-info btn-sm">
                    Dashboard
                </a>
            </div>
        </div>
        <hr>
    </div>

    <!-- Content -->
    <div class="container-fluid">
        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
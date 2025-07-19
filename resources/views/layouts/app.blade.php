<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Player Management System')</title>
    <link rel="icon" href="{{ asset('images/sp_logo.png') }}" type="image/x-icon">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        .player-photo {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 50%;
        }
        .modal-photo {
            max-width: 200px;
            max-height: 200px;
            object-fit: cover;
        }
        .table-responsive {
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }
        .btn-action {
            margin: 0 2px;
        }
        .alert {
            border-radius: 8px;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        .form-control, .form-select {
            border-radius: 8px;
        }
    </style>
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-warning">
        <div class="container">
            <a class="navbar-brand" href="{{ route('userinfo.create') }}">
                <img src="{{ asset('images/sp_logo.png') }}" alt="Super Tatay Logo" class="navbar-logo" style="width: 50px; height: 50px;">
                <span class="navbar-text text-dark">Block 37 Super Tatay Basketball League</span>
            </a>
            {{-- <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('players.index') }}">
                    <i class="fas fa-trophy me-2"></i>Players
                </a>
                <a class="nav-link" href="{{ route('userinfo.create') }}">
                    <i class="fas fa-user-plus me-2"></i>Add Your Info
                </a>
            </div>
        </div> --}}
    </nav>

    <div class="container mt-4">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- Custom JS -->
    <script>
        // Global AJAX setup
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Auto-hide alerts after 5 seconds
        $(document).ready(function() {
            setTimeout(function() {
                $('.alert').fadeOut('slow');
            }, 5000);
        });
    </script>
    @yield('scripts')
</body>
</html> 
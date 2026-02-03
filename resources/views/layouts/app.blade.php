<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>URL Shortener</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8fafc;
        }

        .sidebar {
            width: 260px;
            background-color: #ffffff;
            border-right: 1px solid #e5e7eb;
        }

        .brand {
            color: #0ea5e9;
            font-weight: 600;
            font-size: 1.25rem;
        }

        .nav-link {
            color: #334155;
            border-radius: 6px;
        }

        .nav-link:hover,
        .nav-link.active {
            background-color: #e0f2fe;
            color: #0284c7;
        }

        .content-wrapper {
            min-height: calc(100vh - 56px);
        }

        footer {
            border-top: 1px solid #e5e7eb;
            background-color: #ffffff;
        }
    </style>
</head>

<body>

<div class="d-flex">
    <!-- Sidebar -->
    <aside class="sidebar p-4">
        <div class="mb-4">
            <div class="brand">
                🔗 URL Shortener
            </div>
            <small class="text-muted">Assignment</small>
        </div>

        @auth
            <ul class="nav flex-column gap-1">

                <li class="nav-item">
                    <a href="/dashboard" class="nav-link">
                        Dashboard
                    </a>
                </li>

                @if(auth()->user()->hasRole('SuperAdmin'))
                    <li class="nav-item">
                        <a href="/superadmin/invite-admin" class="nav-link">
                            Invite Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/superadmin/short-urls" class="nav-link">
                            All Short URLs
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Admin'))
                    <li class="nav-item">
                        <a href="/admin/short-urls" class="nav-link">
                            Short URLs
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/invite-user" class="nav-link">
                            Invite User
                        </a>
                    </li>
                @endif

                @if(auth()->user()->hasRole('Member'))
                    <li class="nav-item">
                        <a href="/member/short-urls" class="nav-link">
                            My Short URLs
                        </a>
                    </li>
                @endif

            </ul>

            <hr class="my-4">

            <div class="mb-3">
                <div class="fw-semibold text-dark">
                    {{ auth()->user()->name }}
                </div>
                <div class="small text-muted">
                    {{ auth()->user()->email }}
                </div>
            </div>

            <form method="POST" action="/logout">
                @csrf
                <button class="btn btn-outline-primary btn-sm w-100">
                    Logout
                </button>
            </form>
        @endauth
    </aside>

    <!-- Page Content -->
    <main class="flex-grow-1 p-4 content-wrapper">
        @yield('content')
    </main>
</div>

<footer class="text-center py-3">
    <small class="text-muted">
        © {{ date('Y') }} URL Shortener Assignment
    </small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

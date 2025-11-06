
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>500 · Internal Server Error</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(180deg, #f6f9ff 0%, #ffffff 100%);
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            color: #0f172a;
        }
        .error-card {
            max-width: 900px;
            width: 100%;
        }
        .error-illustration {
            width: 96px;
            height: 96px;
            display: inline-grid;
            place-items: center;
            border-radius: 18px;
            background: linear-gradient(135deg,#fff1f0,#fff6f0);
            color: #7f1d1d;
            font-size: 44px;
            box-shadow: 0 6px 20px rgba(15,23,42,0.06);
        }
        .muted-sm { color: #64748b; }
    </style>
</head>
<body>
    <div class="card error-card shadow-sm border-0">
        <div class="row g-0 align-items-center">
            <div class="col-md-5 d-flex align-items-center justify-content-center p-4">
                <div class="text-center">
                    <div class="error-illustration mb-3" aria-hidden>
                        <!-- inline server/bug SVG -->
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                            <path d="M3 6h18v4H3V6zM3 14h18v4H3v-4z" fill="#7f1d1d" opacity="0.9"/>
                            <circle cx="6" cy="8" r="1" fill="#fff"/>
                            <circle cx="10" cy="8" r="1" fill="#fff"/>
                            <circle cx="6" cy="16" r="1" fill="#fff"/>
                            <circle cx="10" cy="16" r="1" fill="#fff"/>
                        </svg>
                    </div>

                    <h4 class="fw-bold mb-1">500 · Internal Server Error</h4>
                    <p class="muted-sm mb-0">Something went wrong on our end. We're working to fix it.</p>
                </div>
            </div>

            <div class="col-md-7 p-4">
                <div class="p-3">
                    <h2 class="h5 fw-semibold">Server Error</h2>
                    <p class="muted-sm">
                        An unexpected condition was encountered and the request could not be completed.
                        Try refreshing the page or come back later. If the problem persists, contact support.
                    </p>

                    <ul class="list-unstyled mb-3">
                        <li class="mb-2"><strong>Requested URL:</strong> <span class="muted-sm">{{ request()->getRequestUri() }}</span></li>
                        <li class="mb-2"><strong>Reference:</strong> <span class="muted-sm">500-internal-server-error</span></li>
                    </ul>

                    <div class="d-flex gap-2 mb-3">
                        <button onclick="location.reload()" class="btn btn-outline-primary">Retry</button>
                        <a href="{{ url('/') }}" class="btn btn-primary">Home</a>
                        <a href="mailto:support@example.com?subject=500%20Server%20Error&body=I%20received%20500%20at%20{{ url()->current() }}" class="btn btn-outline-secondary">Contact Support</a>
                    </div>

                    <small class="d-block muted-sm">Tip: If you are the site admin, check the server logs for error details (storage/logs/laravel.log).</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
```// filepath: c:\xampp\htdocs\Laravel\LMS_Science\resources\views\errors\500.blade.php
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>500 · Internal Server Error</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: linear-gradient(180deg, #f6f9ff 0%, #ffffff 100%);
            font-family: system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
            color: #0f172a;
        }
        .error-card {
            max-width: 900px;
            width: 100%;
        }
        .error-illustration {
            width: 96px;
            height: 96px;
            display: inline-grid;
            place-items: center;
            border-radius: 18px;
            background: linear-gradient(135deg,#fff1f0,#fff6f0);
            color: #7f1d1d;
            font-size: 44px;
            box-shadow: 0 6px 20px rgba(15,23,42,0.06);
        }
        .muted-sm { color: #64748b; }
    </style>
</head>
<body>
    <div class="card error-card shadow-sm border-0">
        <div class="row g-0 align-items-center">
            <div class="col-md-5 d-flex align-items-center justify-content-center p-4">
                <div class="text-center">
                    <div class="error-illustration mb-3" aria-hidden>
                        <!-- inline server/bug SVG -->
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                            <path d="M3 6h18v4H3V6zM3 14h18v4H3v-4z" fill="#7f1d1d" opacity="0.9"/>
                            <circle cx="6" cy="8" r="1" fill="#fff"/>
                            <circle cx="10" cy="8" r="1" fill="#fff"/>
                            <circle cx="6" cy="16" r="1" fill="#fff"/>
                            <circle cx="10" cy="16" r="1" fill="#fff"/>
                        </svg>
                    </div>

                    <h4 class="fw-bold mb-1">500 · Internal Server Error</h4>
                    <p class="muted-sm mb-0">Something went wrong on our end. We're working to fix it.</p>
                </div>
            </div>

            <div class="col-md-7 p-4">
                <div class="p-3">
                    <h2 class="h5 fw-semibold">Server Error</h2>
                    <p class="muted-sm">
                        An unexpected condition was encountered and the request could not be completed.
                        Try refreshing the page or come back later. If the problem persists, contact support.
                    </p>

                    <ul class="list-unstyled mb-3">
                        <li class="mb-2"><strong>Requested URL:</strong> <span class="muted-sm">{{ request()->getRequestUri() }}</span></li>
                        <li class="mb-2"><strong>Reference:</strong> <span class="muted-sm">500-internal-server-error</span></li>
                    </ul>

                    <div class="d-flex gap-2 mb-3">
                        <button onclick="location.reload()" class="btn btn-outline-primary">Retry</button>
                        <a href="{{ url('/') }}" class="btn btn-primary">Home</a>
                        <a href="mailto:support@example.com?subject=500%20Server%20Error&body=I%20received%20500%20at%20{{ url()->current() }}" class="btn btn-outline-secondary">Contact Support</a>
                    </div>

                    <small class="d-block muted-sm">Tip: If you are the site admin, check the server logs for error details (storage/logs/laravel.log).</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
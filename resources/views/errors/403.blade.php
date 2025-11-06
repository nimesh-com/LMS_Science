
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>403 · Forbidden</title>

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
            max-width: 820px;
            width: 100%;
        }
        .error-illustration {
            width: 96px;
            height: 96px;
            display: inline-grid;
            place-items: center;
            border-radius: 18px;
            background: linear-gradient(135deg,#eef2ff,#e6f0ff);
            color: #334155;
            font-size: 48px;
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
                    <div class="error-illustration mb-3">
                        <!-- inline lock SVG -->
                        <svg width="44" height="44" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden>
                            <path d="M12 15a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" fill="#0f172a" opacity="0.9"/>
                            <path d="M17 8h-1V6a4 4 0 0 0-8 0v2H7a1 1 0 0 0-1 1v9a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V9a1 1 0 0 0-1-1zM9 6a3 3 0 0 1 6 0v2H9V6z" fill="#0f172a"/>
                        </svg>
                    </div>

                    <h4 class="fw-bold mb-1">403 · Forbidden</h4>
                    <p class="muted-sm mb-0">You don't have permission to access this page.</p>
                </div>
            </div>

            <div class="col-md-7 p-4">
                <div class="p-3">
                    <h2 class="h5 fw-semibold">Access Denied</h2>
                    <p class="muted-sm">
                        The server understood the request, but is refusing to authorize it.
                        If you believe this is an error, please contact the site administrator or request access.
                    </p>

                    <ul class="list-unstyled mb-3">
                        <li class="mb-2"><strong>Requested URL:</strong> <span class="muted-sm">{{ request()->getRequestUri() }}</span></li>
                        <li class="mb-2"><strong>Reference:</strong> <span class="muted-sm">403-forbidden</span></li>
                    </ul>

                    <div class="d-flex gap-2 mb-3">
                        <a href="javascript:history.back()" class="btn btn-outline-primary">
                            ← Go Back
                        </a>

                        <a href="{{ url('/') }}" class="btn btn-primary">
                            Home
                        </a>

                        <a href="mailto:support@example.com?subject=403%20Access%20Request&body=I%20received%20a%20403%20at%20{{ url()->current() }}" class="btn btn-outline-secondary">
                            Contact Support
                        </a>
                    </div>

                    <small class="d-block muted-sm">Tip: If you recently logged in, try logging out and back in or request proper permissions.</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
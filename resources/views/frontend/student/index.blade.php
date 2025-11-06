@extends('layouts.frontend')

@section('content')
<style>
    .sidebar {
        min-height: 100vh;
    }

    .card-shadow {
        box-shadow: 0 6px 18px rgba(20, 20, 50, 0.06);
    }

    .video-thumb {
        height: 140px;
        object-fit: cover;
        border-radius: 8px;
    }

    .section {
        padding: 20px;
        display: none;
    }

    .section.active {
        display: block;
    }
</style>

<div class="container-fluid">
    <div class="row g-0">
        <!-- Simplified Sidebar -->
        <aside class="col-auto col-md-3 col-xl-2 bg-light border-end sidebar px-3 py-3">
            <div class="mb-4">
                <h5 class="mb-0 fw-bold">MyLMS</h5>
                <small class="text-muted">Student Portal</small>
            </div>

            <div class="mb-3 d-flex align-items-center">
                <img src="{{ optional($student)->profile_image ? asset($student->profile_image) : asset('images/logo.jpg') }}" alt="Profile"

                    class="rounded-circle me-2" width="50" height="50" alt="Profile Image">
                <div>
                    <div class="fw-semibold">{{ Auth::user()->name ?? 'Student' }}</div>
                </div>
            </div>

            <!-- Navigation Links -->
            <ul class="nav nav-pills flex-column" id="lmsNav">
                <li class="nav-item"><a class="nav-link active" href="#dashboard" data-section="dashboard">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#online-classes" data-section="online-classes">Online Classes</a></li>
                <li class="nav-item"><a class="nav-link" href="#videos" data-section="videos">Class Videos</a></li>
                <li class="nav-item"><a class="nav-link" href="#enroll" data-section="enroll">Enroll Course</a></li>
                                <li class="nav-item"><a class="nav-link" href="#videos" data-section="payment">Payment</a></li>
                <li class="nav-item mt-3"><a class="btn btn-outline-danger w-100" href="#">Logout</a></li>
            </ul>
        </aside>

        <!-- Main Content -->
        <main class="col py-4">
            <!-- Dashboard Section -->
            <section id="dashboard" class="section active">
                <h4 class="mb-4">Dashboard</h4>
                <!-- Announcements Card -->
                <div class="card card-shadow mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">Announcements</h5>
                    </div>
                    <div class="card-body">
                        <div class="list-group">
                            @foreach(['New course available!', 'System maintenance notice', 'Holiday schedule'] as $announcement)
                            <div class="list-group-item">
                                <h6>{{ $announcement }}</h6>
                                <small class="text-muted">Posted: Today</small>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <h6>Enrolled Courses</h6>
                                <h3>3</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <h6>Upcoming Classes</h6>
                                <h3>2</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <h6>Available Videos</h6>
                                <h3>12</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Online Classes Section -->
            <section id="online-classes" class="section">
                <h4 class="mb-4 fw-bold">Online Classes</h4>
                <div class="row g-4">
                    @forelse($OnlinceClasses as $class)
                    <div class="col-md-4">
                        <div class="card border-0 rounded-4 shadow-sm h-100">
                            <div class="position-relative">
                                <img src="{{ $class->thumbnail ? asset('OnlineClass/'.$class->thumbnail) : 'https://via.placeholder.com/600x300' }}"
                                    class="card-img-top rounded-top-4 img-fluid"
                                    style="width:100%; height:200px; object-fit:cover;"
                                    alt="{{ $class->title }}">

                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-primary">Live</span>
                                </div>
                            </div>
                            <div class="card-body p-4">
                                <h5 class="card-title fw-bold mb-3">{{ $class->title }}</h5>
                                <p class="card-text text-muted mb-4">{{ $class->description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    @if($class->status == 1)
                                    <a href="{{ $class->slug }}" class="btn btn-success px-4 rounded-3">
                                        Join Now
                                        <i class="bi bi-arrow-right ms-2"></i>
                                    </a>
                                    @else
                                    <button class="btn btn-secondary px-4 rounded-3" disabled>
                                        Class Inactive
                                        <i class="bi bi-slash-circle ms-2"></i>
                                    </button>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12">
                        <div class="card border-0 rounded-4 shadow-sm">
                            <div class="card-body p-4 text-center">
                                <i class="bi bi-calendar-x display-4 text-muted mb-3"></i>
                                <h5 class="fw-bold">No online classes available</h5>
                                <p class="text-muted">Check back later for upcoming classes</p>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>
            </section>

            <!-- Class Videos Section -->
            <section id="videos" class="section">
                <h4 class="mb-4">Class Videos</h4>
                <div class="row">
                    @foreach(['Introduction to Physics', 'Chemical Reactions', 'Algebraic Equations'] as $video)
                    <div class="col-md-4 mb-3">
                        <div class="card card-shadow">
                            <img src="https://via.placeholder.com/300x140" class="video-thumb" alt="video thumbnail">
                            <div class="card-body">
                                <h6>{{ $video }}</h6>
                                <p class="text-muted small">Duration: 45 mins</p>
                                <a href="#" class="btn btn-primary btn-sm">Watch Now</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Enroll Course Section -->
            <section id="enroll" class="section">
                <h4 class="mb-4">Available Courses</h4>
                <div class="row">
                    @foreach(['Advanced Mathematics', 'Organic Chemistry', 'Modern Physics'] as $course)
                    <div class="col-md-4 mb-3">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <h5>{{ $course }}</h5>
                                <p class="text-muted">12 weeks course</p>
                                <button class="btn btn-primary">Enroll Now</button>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>

            <!-- Payment Section -->
                  <section id="payment" class="section">
                <h4 class="mb-4">payment</h4>
                <div class="row">
                <div class="col-md-6 mx-auto">
                    <div class="card card-shadow">
                        <div class="card-body">
                            <form action="#" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="payment_slip" class="form-label">Upload Payment Slip</label>
                                    <input type="file" class="form-control" id="payment_slip" name="payment_slip" accept="image/*" required>
                                </div>
                                <div class="mb-3">
                                    <label for="reference" class="form-label">Reference Number</label>
                                    <input type="text" class="form-control" id="reference" name="reference" placeholder="Enter payment reference" required>
                                </div>
                                <div class="mb-3">
                                    <label for="payment_type" class="form-label">Payment Type</label>
                                    <select class="form-select" id="payment_type" name="payment_type" required>
                                        <option value="">Select payment type</option>
                                        <option value="bank">Bank Transfer</option>
                                        <option value="mobile">Mobile Money</option>
                                        <option value="card">Card Payment</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary w-100">Submit Payment</button>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </section>
        </main>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('#lmsNav .nav-link');

        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();

                // Remove active class from all links and sections
                navLinks.forEach(l => l.classList.remove('active'));
                document.querySelectorAll('.section').forEach(s => s.classList.remove('active'));

                // Add active class to clicked link and corresponding section
                this.classList.add('active');
                const sectionId = this.getAttribute('data-section');
                document.getElementById(sectionId).classList.add('active');
            });
        });
    });
</script>
@endsection
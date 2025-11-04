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
                <img src="{{ $student->profile_image ? asset($student->profile_image) : asset('images/logo.jpg') }}"
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
                <h4 class="mb-4">Online Classes</h4>
                <div class="row">
                    @foreach(['Math 101', 'Physics Basic', 'Chemistry Lab'] as $class)
                    <div class="col-md-6 mb-3">
                        <div class="card card-shadow">
                            <div class="card-body">
                                <h5>{{ $class }}</h5>
                                <p class="text-muted">Starting in 30 minutes</p>
                                <a href="#" class="btn btn-success">Join Class</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
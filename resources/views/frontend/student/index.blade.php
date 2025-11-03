@extends('layouts.frontend')

@section('content')
<style>
    .sidebar { min-height: 100vh; }
    .card-shadow { box-shadow: 0 6px 18px rgba(20,20,50,0.06); }
    .course-thumb { height:72px; width:100%; object-fit:cover; border-radius:6px; }
    .progress { height:8px; border-radius:6px; }
</style>

<div class="container-fluid">
    <div class="row g-0">

        <!-- Sidebar (kept minimal) -->
        <aside class="col-auto col-md-3 col-xl-2 bg-light border-end sidebar px-3 py-3">
            <div class="mb-4">
                <h5 class="mb-0 fw-bold">MyLMS</h5>
                <small class="text-muted">Student Portal</small>
            </div>

            <div class="mb-3 d-flex align-items-center">
                <img src="{{ Auth::user()->avatar ?? 'https://via.placeholder.com/48' }}" class="rounded-circle me-2" width="48" height="48">
                <div>
                    <div class="fw-semibold">{{ Auth::user()->name ?? 'Student' }}</div>
                    <small class="text-muted">{{ Auth::user()->email ?? '' }}</small>
                </div>
            </div>

            <ul class="nav nav-pills flex-column">
                <li class="nav-item"><a class="nav-link active" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Courses</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Live</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Assignments</a></li>
                <li class="nav-item mt-3"><a class="btn btn-outline-danger w-100" href="#">Logout</a></li>
            </ul>
        </aside>

        <!-- Main -->
        <main class="col py-4">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <div>
                    <h4 class="mb-0">Student Dashboard</h4>
                    <small class="text-muted">Welcome back, {{ Auth::user()->name ?? 'Student' }}</small>
                </div>

                <div class="d-flex gap-2 align-items-center">
                    <form class="d-none d-md-block">
                        <div class="input-group input-group-sm">
                            <input class="form-control" placeholder="Search courses or classes">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </form>
                    <a class="btn btn-sm btn-outline-primary" href="#">Notifications</a>
                    <img src="{{ Auth::user()->avatar ?? 'https://via.placeholder.com/36' }}" class="rounded-circle" width="36" height="36">
                </div>
            </div>

            <!-- Announcements -->
            <div class="row mb-3">
                <div class="col-lg-8">
                    <div class="card card-shadow mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong>Announcements</strong>
                            <a href="#" class="small">View all</a>
                        </div>
                        <div class="card-body">
                            @php
                                $announcements = $announcements ?? [
                                    ['title'=>'Platform maintenance','date'=>'Nov 5, 2025','body'=>'System will be down from 2-3 AM UTC.'],
                                    ['title'=>'New course available: Data Science','date'=>'Oct 28, 2025','body'=>'Enroll now for hands-on labs.'],
                                ];
                            @endphp

                            @if(count($announcements))
                                <ul class="list-unstyled mb-0">
                                    @foreach($announcements as $note)
                                        <li class="mb-3">
                                            <div class="d-flex justify-content-between">
                                                <div>
                                                    <div class="fw-semibold">{{ $note['title'] }}</div>
                                                    <div class="small text-muted">{{ $note['date'] }}</div>
                                                    <div class="small mt-1">{{ $note['body'] }}</div>
                                                </div>
                                                <div class="text-end">
                                                    <a href="#" class="btn btn-sm btn-outline-secondary">Details</a>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            @else
                                <p class="text-muted mb-0">No announcements.</p>
                            @endif
                        </div>
                    </div>

                    <!-- Enrolled classes -->
                    <div class="card card-shadow mb-3">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <strong>Enrolled Classes</strong>
                            <a href="#" class="small">Manage enrollments</a>
                        </div>
                        <div class="card-body">
                            @php
                                $enrollments = $enrollments ?? [
                                    ['course'=>'Web Development','instructor'=>'John Doe','progress'=>62,'status'=>'active','online_link'=>'https://meet.example.com/webdev'],
                                    ['course'=>'Database Management','instructor'=>'Sarah Smith','progress'=>28,'status'=>'active','online_link'=>null],
                                ];
                            @endphp

                            @if(count($enrollments))
                                <div class="list-group">
                                    @foreach($enrollments as $e)
                                        <div class="list-group-item d-flex align-items-center justify-content-between">
                                            <div class="d-flex align-items-center gap-3 w-100">
                                                <img src="https://via.placeholder.com/80x72" class="course-thumb">
                                                <div class="flex-grow-1">
                                                    <div class="fw-semibold">{{ $e['course'] }}</div>
                                                    <div class="small text-muted">Instructor: {{ $e['instructor'] }}</div>
                                                    <div class="mt-2 d-flex align-items-center gap-2">
                                                        <div class="progress w-50">
                                                            <div class="progress-bar" role="progressbar" style="width: {{ $e['progress'] }}%;" aria-valuenow="{{ $e['progress'] }}" aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <small class="text-muted">{{ $e['progress'] }}%</small>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-end">
                                                @if($e['online_link'])
                                                    <a target="_blank" href="{{ $e['online_link'] }}" class="btn btn-sm btn-success mb-1">Join Live</a>
                                                @else
                                                    <button class="btn btn-sm btn-outline-secondary mb-1" disabled>No Link</button>
                                                @endif
                                                <div>
                                                    <a href="#" class="btn btn-sm btn-outline-primary">Open</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-muted mb-0">You are not enrolled in any classes.</p>
                                <a href="#" class="btn btn-sm btn-primary mt-2">Find courses</a>
                            @endif
                        </div>
                    </div>

                    <!-- Quick actions -->
                    <div class="card card-shadow mb-3 p-3">
                        <div class="d-flex gap-2">
                            <a class="btn btn-outline-primary" href="#">Submit Assignment</a>
                            <a class="btn btn-outline-success" href="#">Join Next Live</a>
                            <a class="btn btn-outline-secondary" href="#">Contact Tutor</a>
                        </div>
                    </div>
                </div>

                <!-- Right column: small summary & upcoming -->
                <div class="col-lg-4">
                    <div class="card card-shadow mb-3 p-3">
                        <strong>Summary</strong>
                        <div class="mt-2 small text-muted">
                            Enrolled: <strong>{{ $enrolledCount ?? count($enrollments) }}</strong><br>
                            Upcoming live: <strong>{{ $upcomingCount ?? 1 }}</strong><br>
                            Assignments due: <strong>{{ $assignmentsDue ?? 2 }}</strong>
                        </div>
                    </div>

                    <div class="card card-shadow mb-3 p-3">
                        <strong>Next Live Class</strong>
                        @php
                            $next_live = $next_live ?? ['title'=>'React Workshop','time'=>'Tomorrow 10:00 AM','link'=>'https://meet.example.com/react'];
                        @endphp
                        <div class="mt-2">
                            <div class="fw-semibold">{{ $next_live['title'] }}</div>
                            <div class="small text-muted">{{ $next_live['time'] }}</div>
                            <div class="mt-2">
                                <a target="_blank" href="{{ $next_live['link'] }}" class="btn btn-sm btn-success">Join Now</a>
                            </div>
                        </div>
                    </div>

                    <div class="card card-shadow p-3">
                        <strong>Support</strong>
                        <p class="small text-muted mb-2">Need help? Contact support or check FAQs.</p>
                        <a href="#" class="btn btn-sm btn-outline-primary w-100">Contact Support</a>
                    </div>
                </div>
            </div>

            <div class="text-center text-muted small mt-3">&copy; {{ date('Y') }} MyLMS</div>
        </main>
    </div>
</div>
@endsection

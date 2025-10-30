   @extends('layouts.backend')

   @section('content')


   @if (session('success'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ session('success') }}
   </div>
   @endif

   <div class="card shadow mb-4">
       <div class="card-header py-3 d-flex justify-content-between align-items-center">
           <h6 class="m-0 font-weight-bold text-primary">Courses List</h6>
           <a href="{{ route('courses.create') }}" class="btn btn-primary btn-sm"> <i class="fas fa-plus"></i> Add Course</a>
       </div>

       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered table-striped align-middle" id="dataTable" width="100%" cellspacing="0">
                   <thead class="table-primary">
                       <tr>
                           <th style="width: 20%;">Title</th>
                           <th style="width: 20%;">Description</th>
                           <th style="width: 45%;">thubnail</th>
                           <th style="width: 15%; text-align:center;">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       @if ($Courses && $Courses->count() > 0)
                       @foreach ($Courses as $course)
                       <tr>
                           <td>{{ $course->name }}</td>
                           <td>{{ $course->description }}</td>
                           <td>image</td>
                           <td class="text-center">
                               <a href="{{ route('modules.edit', $course->id) }}" class="btn btn-primary btn-sm me-1">Edit</a>
                               <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this module?');">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                               </form>
                           </td>
                       </tr>
                       @endforeach
                       @else
                       <tr>
                           <td colspan="4" class="text-center">No Courses found.</td>
                       </tr>
                       @endif
                   </tbody>
               </table>
           </div>
       </div>
   </div>


   @endsection
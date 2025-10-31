    @extends('layouts.backend')

    @section('content')

    <div class="container mt-5">
       <div class="row justify-content-center">
          <div class="col-12 col-md-8 col-lg-8">
             <div class="card shadow-sm">
                <div class="card-header bg-primary text-white text-center">
                   <h3 class="mb-0">Create Course</h3>
                </div>
                @if($errors -> any())
                <div class="alert alert-danger m-3">
                   <ul class="mb-0">
                      @foreach($errors -> all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                   </ul>
                </div>
                @endif
                <div class="card-body">
                   <form method="POST" action="{{route('courses.store')}}" enctype="multipart/form-data">
                      @csrf

                      <div class="form-floating mb-3">
                         <input type="text" class="form-control" id="courseName" name="title" placeholder="Course Name">
                         <label for="CourseName">Course Title</label>
                         @error('title')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                      </div>
                      <div class="form-floating mb-3">
                         <textarea class="form-control" id="courseDescription" name="description" placeholder="Description" style="height: 120px;"></textarea>
                         <label for="Description">Description</label>
                         @error('description')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                      </div>

                      <div class="form-floating mb-3">
                         <input type="file" class="form-control" id="thumbnail" name="thumbnail" placeholder="Thumbnail">
                         <label for="thumbnail">Thumbnail</label>
                         @error('thumbnail')
                         <span class="text-danger">{{ $message }}</span>
                         @enderror
                      </div>

                      <div class="form-floating mb-3">
                         <select name="teacher_id" class="form-control" id="">
                            @foreach($Instructors as $instructor)
                            <option value=""> -- Select Instructor -- </option>
                            <option value="{{ $instructor->id }}">{{ $instructor->name }}</option>
                            @endforeach
                         </select>
                         <label for="instructor">Instructor</label>
                      </div>


                      <button type="submit" class="btn btn-success w-100">Create Course</button>
                   </form>
                </div>
             </div>
          </div>
       </div>
    </div>



    @endsection
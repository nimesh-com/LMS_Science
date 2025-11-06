@extends('layouts.backend')

@section('content')

<div class="container mt-5">
   <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-8">
         <div class="card shadow-sm">
            <div class="card-header bg-primary text-white text-center">
               <h3 class="mb-0">Edit Course</h3>
            </div>

            @if($errors->any())
            <div class="alert alert-danger m-3">
               <ul class="mb-0">
                  @foreach($errors->all() as $error)
                  <li>{{ $error }}</li>
                  @endforeach
               </ul>
            </div>
            @endif

            <div class="card-body">
               <form method="POST" action="{{route('courses.update', $courses->id)}}" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')

                  <div class="form-floating mb-3">
                     <input type="text" class="form-control" value="{{$courses->title}}" id="courseName" name="title" placeholder="Course Name">
                     <label for="courseName">Course Title</label>
                     @error('title')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-floating mb-3">
                     <textarea class="form-control"
                        id="courseDescription"
                        name="description"
                        placeholder="Description"
                        style="height: 120px;">{{ old('description', $courses->description ?? '') }}</textarea>
                     <label for="courseDescription">Description</label>
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

                     @if(!empty($courses->thumbnail))
                     <div class="mt-2 text-center">
                        <img src="{{ asset($courses->thumbnail) }}" alt="Current Thumbnail" class="img-thumbnail" style="max-width: 150px;">
                        <p class="text-muted small mt-1">Current Thumbnail</p>
                     </div>
                     @endif
                  </div>


                  <!-- New Price Field -->
                  <div class="form-floating mb-3">
                     <input type="number" step="0.01" class="form-control" value="{{$courses->price}}" id="price" name="price" placeholder="Course Price">
                     <label for="price">Price (LKR)</label>
                     @error('price')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <div class="form-floating mb-3">
                     <select name="teacher_id" class="form-control" id="instructor">
                        <option value="">-- Select Instructor --</option>
                        @foreach($Instructors as $instructor)
                        <option value="{{ $instructor->id }}" {{ $instructor->id == $courses->teacher_id ? 'selected' : '' }}>{{ $instructor->name }}</option>
                        @endforeach
                     </select>
                     <label for="instructor">Instructor</label>
                     @error('teacher_id')
                     <span class="text-danger">{{ $message }}</span>
                     @enderror
                  </div>

                  <button type="submit" class="btn btn-success w-100">Update Course</button>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>

@endsection
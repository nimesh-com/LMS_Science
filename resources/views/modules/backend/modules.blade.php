   @extends('layouts.backend')

   @section('content')<!-- DataTales Example -->
   @if(session()->has('success'))
   <div class="alert alert-success alert-dismissible fade show" role="alert">
       {{ session('success') }}
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   </div>
   @endif
   <div class="card shadow mb-4">
       <div class="card-header py-3 d-flex justify-content-between align-items-center">


           <h6 class="m-0 font-weight-bold text-primary">Modules List</h6>
           <a href="{{ route('modules.create') }}" class="btn btn-primary btn-sm">Add Module</a>
       </div>
       <div class="card-body">
           <div class="table-responsive">
               <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                   <thead class="table-primary">
                       <tr>
                           <th>Name</th>
                           <th>Slug</th>
                           <th>Description</th>
                           <th>Action</th>
                       </tr>
                   </thead>
                   <tbody>
                       @if ($Modules && $Modules->count() > 0)
                       @foreach ($Modules as $module)
                       <tr>
                           <td>{{ $module->name }}</td>
                           <td>{{ $module->slug }}</td>
                           <td>{{ $module->description }}</td>
                           <td>
                               <a href="{{ route('modules.edit', $module->id) }}" class="btn btn-primary btn-sm">Edit</a>

                               <form action="{{ route('modules.destroy', $module->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this module?');">
                                   @csrf
                                   @method('DELETE')
                                   <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                               </form>
                           </td>
                       </tr>
                       @endforeach
                       @else
                       <tr>
                           <td colspan="4" class="text-center">No modules found.</td>
                       </tr>
                       @endif
                   </tbody>
               </table>
           </div>
       </div>
   </div>

   @endsection
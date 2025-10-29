    @extends('layouts.backend')

    @section('content')

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white text-center">
                        <h3 class="mb-0">Add Module</h3>
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
                        <form method="POST" action="{{route('modules.store')}}">
                            @csrf

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="moduleName" name="name" placeholder="Module Name" >
                                <label for="moduleName">Module Name</label>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="moduleSlug" name="slug" placeholder="Slug" >
                                <label for="moduleSlug">Slug</label>
                                @error('slug')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-floating mb-3">
                                <textarea class="form-control" id="moduleDescription" name="description" placeholder="Description" style="height: 120px;" ></textarea>
                                <label for="moduleDescription">Description</label>
                                @error('description')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-success w-100">Add Module</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection
@extends('layouts.backend')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">Edit Class</h5>
    <a href="{{ route('classes') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left me-1"></i> Back
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <form action="{{ route('classes.update', $class->id) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-book"></i></span>
                    <input type="text" id="title" name="title"
                        class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title', $class->title) }}"
                        placeholder="Enter class title" required>
                </div>
                @error('title') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="slug" class="form-label">Slug</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-link fa-shake"></i></span>
                    <input type="text" id="slug" name="slug"
                        class="form-control @error('slug') is-invalid @enderror"
                        value="{{ old('slug', $class->slug) }}"
                        placeholder="url-friendly-slug" required>
                </div>
                @error('slug') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <div class="input-group">
                    <span class="input-group-text align-self-start pt-2"><i class="fa-regular fa-note-sticky"></i></span>
                    <textarea id="description" name="description" rows="5"
                        class="form-control @error('description') is-invalid @enderror"
                        placeholder="Write a short description...">{{ old('description', $class->description) }}</textarea>
                </div>
                @error('description') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="row g-3">
                <div class="col-md-6">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-image"></i></span>
                        <input type="file" id="thumbnail" name="thumbnail"
                            class="form-control @error('thumbnail') is-invalid @enderror"
                            accept="image/*">
                    </div>
                    @if($class->thumbnail)
                    <div class="mt-2">
                        <img src="{{ asset('Onlineclass/'.$class->thumbnail) }}" alt="Current thumbnail"
                            class="img-thumbnail" style="max-height: 100px">
                    </div>
                    @endif
                    <div class="form-text">Recommended: 800x450px. JPG / PNG</div>
                    @error('thumbnail') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>

                <div class="col-md-6">
                    <label for="scheduled_at" class="form-label">Scheduled At (time)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fa-solid fa-clock"></i></span>
                        <input type="time" id="scheduled_at" name="scheduled_at"
                            class="form-control @error('scheduled_at') is-invalid @enderror"
                            value="{{ old('scheduled_at', $class->scheduled_at ? date('H:i', strtotime($class->scheduled_at)) : '') }}">
                    </div>
                    @error('scheduled_at') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="mt-3 mb-3">
                <label for="scheduled_date" class="form-label">Scheduled Date</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa-solid fa-calendar-days"></i></span>
                    <input type="date" id="scheduled_date" name="scheduled_date"
                        class="form-control @error('scheduled_date') is-invalid @enderror"
                        value="{{ old('scheduled_date', $class->scheduled_date ? date('Y-m-d', strtotime($class->scheduled_date)) : '') }}">
                </div>
                @error('scheduled_date') <div class="invalid-feedback d-block">{{ $message }}</div> @enderror
            </div>

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-circle-plus"></i> Update Class
                </button>
                <a href="{{ route('classes') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
            <input type="text" name="id" value="{{ $class->id }}" hidden>
        </form>
    </div>
</div>
@endsection
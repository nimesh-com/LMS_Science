@extends('layouts.backend')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">Classes</h5>
    <div>
        <a href="{{ route('classes.create') }}" class="btn btn-primary add-class">
            <i class="fas fa-plus me-1"></i> Add Class
        </a>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-body p-3">
        <div class="table-responsive">
            <table class="table table-striped table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Class ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Thumbnail</th>
                        <th>Scheduled At</th>
                        <th>Scheduled Date</th>
                        <th style="width:18%;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($classes ?? [] as $item)
                    <tr>
                        <td>{{ $item->id ?? '-' }}</td>
                        <td class="text-start">
                            <div class="fw-semibold">{{ $item->title ?? '-' }}</div>
                        </td>
                        <td>{{ $item->slug ?? '-' }}</td>
                        <td>
                            @if(!empty($item->thumbnail))
                            <img src="{{ asset('Onlineclass/'.$item->thumbnail) }}" alt="thumb" class="img-thumbnail" style="max-width:92px; height:auto;">
                            @else
                            <span class="text-muted small">No image</span>
                            @endif
                        </td>
                        <td>
                            {{ $item->scheduled_at ? \Carbon\Carbon::parse($item->scheduled_at)->format('h:i A') : '-' }}
                        </td>
                        <td>
                            {{ $item->scheduled_date ? \Carbon\Carbon::parse($item->scheduled_date)->format('d M, Y') : '-' }}

                        </td>
                        <td>
                            <div class="d-flex gap-2">

                                <a href="{{ route('classes.edit', $item->id) }}" class="btn btn-sm btn-outline-secondary d-flex align-items-center">
                                    <i class="fas fa-edit me-1"></i> Edit
                                </a>

                                <form action="{{ route('classes.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Delete this class?');" class="m-0">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger d-flex align-items-center">
                                        <i class="fas fa-trash-alt me-1"></i> Delete
                                    </button>
                                </form>
                                <form action="{{ route('classes.status', $item->id) }}" method="POST" class="m-0">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="btn btn-sm d-flex align-items-center 
               {{ $item->status ? 'btn-outline-success' : 'btn-outline-danger' }}">
                                        <i class="fas fa-toggle-on me-1"></i>
                                        {{ $item->status ? 'Deactivate' : 'Activate' }}
                                    </button>


                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="8" class="text-center py-4">
                            <div class="text-muted">
                                <i class="bi bi-inbox display-6"></i>
                                <div class="mt-2">No classes found. <a href="{{ route('classes.create') }}">Create a class</a></div>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
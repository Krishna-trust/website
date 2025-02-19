@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Content List</h4>
                <a href="{{ route('admin.contents.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Content
                </a>
            </div>
        </div>
        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-2">
                    <select class="form-select" id="per-page">
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div class="col-md-4 ms-auto">
                    <input type="text" class="form-control" id="search" placeholder="Search...">
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Upload Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contents as $index => $content)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($content->image)
                                    <img src="{{ asset('storage/' . $content->image) }}" 
                                         alt="Content Image" 
                                         class="img-thumbnail"
                                         style="max-width: 100px; max-height: 100px;">
                                @else
                                    No Image
                                @endif
                            </td>
                            <td>{{ date('d-m-Y', strtotime($content->upload_date)) }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.contents.edit', $content->id) }}" 
                                       class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.contents.destroy', $content->id) }}" 
                                          method="POST" 
                                          class="d-inline"
                                          onsubmit="return confirm('Are you sure you want to delete this content?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">No content found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($contents->count() > 0)
            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted small">
                    Showing records {{ $contents->firstItem() ?? 0 }} to {{ $contents->lastItem() ?? 0 }} of {{ $contents->total() ?? 0 }}
                </div>
                {{ $contents->links() }}
            </div>
            @endif
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
}
.card-header {
    background-color: #fff;
    border-bottom: 1px solid #eee;
}
.btn-group {
    gap: 5px;
}
.table th {
    font-weight: 600;
    color: #333;
}
.table td {
    vertical-align: middle;
}
.pagination {
    margin: 0;
}
</style>
@endsection

@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="card">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0">Labharthi List</h4>
                <a href="{{ route('admin.labharthi.create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Add Labharthi
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
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Mobile Number</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($labharthis as $index => $labharthi)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ Str::before($labharthi->name, ' ') }}</td>
                            <td>{{ Str::after($labharthi->name, ' ') }}</td>
                            <td>{{ $labharthi->mobile_number }}</td>
                            <td>{{ $labharthi->email ?? '-' }}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.labharthi.edit', $labharthi) }}" class="btn btn-sm btn-info">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.labharthi.destroy', $labharthi) }}" 
                                          method="POST" 
                                          class="d-inline-block"
                                          onsubmit="return confirm('Are you sure you want to delete this labharthi?')">
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
                            <td colspan="6" class="text-center">No records found</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-between align-items-center mt-3">
                <div class="text-muted small">
                    Showing records {{ $labharthis->firstItem() ?? 0 }} to {{ $labharthis->lastItem() ?? 0 }} of {{ $labharthis->total() ?? 0 }}
                </div>
                <div class="d-flex align-items-center gap-1">
                    @if($labharthis->currentPage() > 1)
                        <a href="{{ $labharthis->url(1) }}" class="btn btn-light btn-sm pagination-btn" title="First Page">
                            <i class="fas fa-angle-double-left"></i>
                        </a>
                        <a href="{{ $labharthis->previousPageUrl() }}" class="btn btn-light btn-sm pagination-btn" title="Previous Page">
                            <i class="fas fa-angle-left"></i>
                        </a>
                    @else
                        <button class="btn btn-light btn-sm pagination-btn" disabled>
                            <i class="fas fa-angle-double-left"></i>
                        </button>
                        <button class="btn btn-light btn-sm pagination-btn" disabled>
                            <i class="fas fa-angle-left"></i>
                        </button>
                    @endif
                    
                    @php
                        $start = max($labharthis->currentPage() - 2, 1);
                        $end = min($start + 4, $labharthis->lastPage());
                        if($end - $start < 4) {
                            $start = max($end - 4, 1);
                        }
                    @endphp

                    @if($start > 1)
                        <a href="{{ $labharthis->url(1) }}" class="text-decoration-none text-muted">1</a>
                        @if($start > 2)
                            <span class="text-muted">...</span>
                        @endif
                    @endif

                    @for($i = $start; $i <= $end; $i++)
                        @if($i == $labharthis->currentPage())
                            <span class="px-2 py-1 bg-primary text-white rounded">{{ $i }}</span>
                        @else
                            <a href="{{ $labharthis->url($i) }}" class="text-decoration-none text-muted">{{ $i }}</a>
                        @endif
                    @endfor

                    @if($end < $labharthis->lastPage())
                        @if($end < $labharthis->lastPage() - 1)
                            <span class="text-muted">...</span>
                        @endif
                        <a href="{{ $labharthis->url($labharthis->lastPage()) }}" class="text-decoration-none text-muted">{{ $labharthis->lastPage() }}</a>
                    @endif

                    @if($labharthis->hasMorePages())
                        <a href="{{ $labharthis->nextPageUrl() }}" class="btn btn-light btn-sm pagination-btn" title="Next Page">
                            <i class="fas fa-angle-right"></i>
                        </a>
                        <a href="{{ $labharthis->url($labharthis->lastPage()) }}" class="btn btn-light btn-sm pagination-btn" title="Last Page">
                            <i class="fas fa-angle-double-right"></i>
                        </a>
                    @else
                        <button class="btn btn-light btn-sm pagination-btn" disabled>
                            <i class="fas fa-angle-right"></i>
                        </button>
                        <button class="btn btn-light btn-sm pagination-btn" disabled>
                            <i class="fas fa-angle-double-right"></i>
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.card {
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    background: #fff;
}

.btn-primary {
    background: #ff3366;
    border-color: #ff3366;
    border-radius: 5px;
    padding: 8px 20px;
}

.btn-primary:hover {
    background: #ff1a4d;
    border-color: #ff1a4d;
}

.form-control, .form-select {
    border-radius: 5px;
    border: 1px solid #e0e0e0;
    padding: 8px 12px;
}

.form-control:focus, .form-select:focus {
    border-color: #ff3366;
    box-shadow: 0 0 0 0.2rem rgba(255,51,102,0.25);
}

.table th {
    font-weight: 500;
    color: #666;
    border-bottom: 2px solid #f0f0f0;
}

.table td {
    vertical-align: middle;
    color: #444;
    border-bottom: 1px solid #f0f0f0;
}

.btn-group .btn {
    padding: 5px 10px;
    margin: 0 2px;
}

.pagination-btn {
    padding: 4px 8px;
    border: 1px solid #dee2e6;
    background: #fff;
    color: #666;
    border-radius: 4px;
    line-height: 1;
    margin: 0 2px;
}

.pagination-btn:hover:not(:disabled) {
    background: #ff3366;
    border-color: #ff3366;
    color: #fff;
}

.pagination-btn:disabled {
    opacity: 0.5;
    cursor: not-allowed;
}

.pagination-btn i {
    font-size: 12px;
}

.bg-primary {
    background-color: #ff3366 !important;
}

.text-muted:hover {
    color: #ff3366 !important;
}
</style>

@push('scripts')
<script>
    $(document).ready(function() {
        // Handle per page change
        $('#per-page').change(function() {
            window.location.href = '{{ route("admin.labharthi.index") }}?per_page=' + $(this).val();
        });

        // Handle search with debounce
        let searchTimer;
        $('#search').keyup(function() {
            clearTimeout(searchTimer);
            searchTimer = setTimeout(() => {
                window.location.href = '{{ route("admin.labharthi.index") }}?search=' + $(this).val();
            }, 500);
        });

        // Set current values
        $('#per-page').val('{{ request("per_page", 25) }}');
        $('#search').val('{{ request("search") }}');
    });
</script>
@endpush
@endsection

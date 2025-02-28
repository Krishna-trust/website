@extends('layouts.app')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">{{ @trans('messages.daily_content') }}</h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.contents.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ @trans('messages.daily_content') }}</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card overflow-hidden customers">
            <div class="p-4 card-body">
                <div class="d-flex justify-content-between">
                    <div class="d-flex justify-content-start w-75">
                        <select id="selected_data" onchange="reloadTable()" class="w-25 form-control form-select">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end w-lg-25 w-md-50 me-2">
                        <input type="text" name="search" class="form-control" id="search-val" onkeyup="reloadTable()" @if (empty($search)) placeholder="Search..." @else value="{{ $search }}" @endif>
                    </div>
                    <div class="d-flex justify-content-end w-lg-25 w-md-50">
                        <a href="{{ route('admin.contents.create') }}" class="btn btn-secondary me-2">
                            <span class="d-none d-sm-inline">Add</span> <i class="fa fa-plus"></i>
                        </a>
                    </div>

                </div>
                <div class="mt-4 table-responsive">
                    @include('admin.content.view')
                </div>
            </div>
        </div>
    </div>
</div>

<!-- change status Modal  -->
<div class="modal fade" id="user-delete" tabindex="-1" role="dialog" aria-labelledby="AddmodelLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change status confirmation</h5>
            </div>
            <form action="{{ route('admin.contents.destroy') }}" method="POST">
                @csrf
                @method('DELETE')
                <div class="modal-body">
                    <input type="hidden" name="content_id" id="content_id" value="">
                    <span>Do you want to Delete this record?</span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancel</button>
                    <input type="submit" class="btn btn-primary" value="Confirm">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal for the image -->
<div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center">
                <img src="https://via.placeholder.com/600" alt="Large View" id="popupImage" class="img-fluid">
                <button type="button" class="btn-close border" data-bs-dismiss="modal" aria-label="Close"><span><i class="fa fa-close" style="color:red"></i></span></button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if (session()->has('success'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
    })
    Toast.fire({
        icon: 'success',
        text: "{{ session('success') }}",
    })
</script>
@endif

@if (session()->has('error'))
<script>
    const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
    })
    Toast.fire({
        icon: 'error',
        text: "{{ session('error') }}",
    })
</script>
@endif


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.close-btn').click(function() {
            // e.preventDefault();
            $('.modal').modal('hide');
        })
        $("#editTechnician").click(function() {
            // e.preventDefault();
            $('#user-delete').modal('show');
        });

        $('.user-delete-btn').click(function() {
            var DataId = $(this).data('content-id');
            $('#user_id').val(DataId);

        });
    });

    // image preview
    $('.eye-icon').click(function() {
        var imageUrl = $(this).parent().find('img').attr('src');
        $('#popupImage').attr('src', imageUrl);
    });

    // Use event delegation to handle clicks on the button
    $('.card-body').on('click', '#sortCreatedAt button', function() {
        var sort = $('#sortCreatedAt').attr('data-sort');
        sort = (sort === 'desc') ? 'asc' : 'desc';
        reloadTable(sort);
    });

    //search and filter
    function reloadTable(sort) {
        let search_string = $('#search-val').val();
        let limit = $('#selected_data').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ url('admin.contents.index') }}",
            data: {
                search: search_string,
                limit: limit,
                sort: sort,
            },
            success: function(response) {
                $('.table-responsive').html(response);
            },
        });
    }
</script>

<!-- <div class="container-fluid px-4">
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
</style> -->
@endsection

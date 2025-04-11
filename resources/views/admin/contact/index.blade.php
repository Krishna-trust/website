@extends('layouts.app')
@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">{{ @trans('portal.contacts') }}</h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.contact.index') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ @trans('portal.contacts') }}</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card overflow-hidden customers">
            <div class="p-4 card-body">
                <div class="row d-md-flex justify-content-between align-items-center">
                    <div class="col-12 col-md-auto mb-2 mb-md-0">
                        <select id="selected_data" onchange="reloadTable()" class="form-control form-select me-2" >
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="75">75</option>
                            <option value="100">100</option>
                        </select>
                    </div>
                    <div class="col-12 col-md-auto">
                        <input type="text" name="search" class="form-control" id="search-val" onkeyup="reloadTable()" @if (empty($search)) placeholder="Search..." @else value="{{ $search }}" @endif>
                    </div>
                </div>
                <div class="mt-4 table-responsive">
                    @include('admin.contact.view')
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
                <h5 class="modal-title" id="exampleModalLabel">Delete Content</h5>
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

    //search and filter
    function reloadTable() {
        let search_string = $('#search-val').val();
        let limit = $('#selected_data').val();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            type: "GET",
            url: "{{ route('admin.contact.index') }}",
            data: {
                search: search_string,
                limit: limit,
            },
            success: function(response) {
                $('.table-responsive').html(response);
            },
        });
    }
</script>

@endsection

@extends('layouts.app')

@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center my-0">
        <div>
            <h1 class="page-title">{{ @trans('messages.labharthi') }}</h1>
        </div>
        <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.labharthi.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ @trans('messages.labharthi') }}</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn d-flex d-md-none mt-0">
            {{-- position button --}}
            <a href="{{ route('admin.labharthi.position') }}" class="btn btn-secondary me-2">
                <span class="d-none d-sm-inline">{{ @trans('portal.position') }}</span> <i class="fa fa-street-view"></i>
            </a>
            <a href="{{ route('admin.labharthi.create') }}" class="btn btn-secondary me-2">
                <span class="d-none d-sm-inline">{{ @trans('portal.add') }}</span> <i class="fa fa-plus"></i>
            </a>
            <a href="{{ route('admin.labharthi.export') }}" class="btn btn-primary">
                <span class="d-none d-sm-inline">{{ @trans('portal.export') }}</span> <i class="fa fa-file-excel-o"></i>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card overflow-hidden customers">
                <div class="p-4 card-body">
                    <div class="row d-md-flex justify-content-between align-items-center">
                        <div class="col-12 col-md-auto mb-2 mb-md-0">
                            <select id="selected_data" onchange="reloadTable()" class="form-control form-select me-md-2">
                                <option value="10">10</option>
                                <option value="25">25</option>
                                <option value="50">50</option>
                                <option value="75">75</option>
                                <option value="100">100</option>
                            </select>
                        </div>

                        <div class="col-12 col-md-auto">
                            <div class="d-flex flex-column flex-md-row align-items-stretch">
                                <!-- Search Input -->
                                <input type="text" name="search" class="form-control mb-2 mb-md-0 me-md-2"
                                    id="search-val" onkeyup="reloadTable()"
                                    @if (empty($search)) placeholder="Search..."
                                   @else value="{{ $search }}" @endif>

                                <!-- Add Button (visible on md and up only) -->
                                <div class="d-none d-md-flex justify-content-end">
                                    <a href="{{ route('admin.labharthi.position') }}" class="btn btn-secondary me-2">
                                        <span class="d-none d-sm-inline">{{ @trans('portal.position') }}</span> <i
                                            class="fa fa-street-view"></i>
                                    </a>
                                    <a href="{{ route('admin.labharthi.create') }}" class="btn btn-secondary me-2">
                                        <span class="d-none d-sm-inline">{{ @trans('portal.add') }}</span> <i
                                            class="fa fa-plus"></i>
                                    </a>
                                    <a href="{{ route('admin.labharthi.export') }}" class="btn btn-primary">
                                        <span class="d-none d-sm-inline">{{ @trans('portal.export') }}</span> <i
                                            class="fa fa-file-excel-o"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 table-responsive">
                        @include('admin.labharthi.view')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- change status Modal  -->
    <div class="modal fade" id="user-delete" tabindex="-1" role="dialog" aria-labelledby="AddmodelLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Labharthi</h5>
                </div>
                <form action="{{ route('admin.labharthi.destroy') }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <input type="hidden" name="labharthi_id" id="labharthi_id" value="">
                        <span>Do you want to Delete this labharthi record?</span>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cancel</button>
                        <input type="submit" class="btn btn-primary" value="Confirm">
                    </div>
                </form>
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
                var DataId = $(this).data('labharthi-id');
                $('#labharthi_id').val(DataId);
            });
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
                url: "{{ route('admin.labharthi.index') }}",
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
@endsection

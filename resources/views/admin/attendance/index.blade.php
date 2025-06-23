@extends('layouts.app')
@section('content')
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center my-0">
        <div>
            <h1 class="page-title">{{ @trans('portal.attendance') }}</h1>
        </div>
        <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.attendance.index') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ @trans('portal.attendance') }}</li>
            </ol>
        </div>
        {{-- <div class="ms-auto pageheader-btn d-flex d-md-none mt-0">
            <a href="{{ route('admin.donation.export') }}" class="btn btn-primary">
                <span class="d-none d-sm-inline">{{ @trans('portal.export') }}</span> <i class="fa fa-file-excel-o"></i>
            </a>
        </div> --}}
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card overflow-hidden customers">
                <div class="p-4 card-body">
                    <div class="row d-md-flex justify-content-between align-items-center">
                        <div class="col-12 col-md-auto mb-2 mb-md-0">
                            <input type="date" class="form-control me-3" id="date" name="date">
                        </div>
                        <div class="col-12 col-md-auto">
                            <div class="d-flex flex-column flex-md-row align-items-stretch">
                                <!-- Search Input -->
                                <input type="text" name="search" class="form-control mb-2 mb-md-0 me-md-2"
                                    id="search-val" onkeyup="reloadTable()"
                                    @if (empty($search)) placeholder="Search..."
                                   @else value="{{ $search }}" @endif>

                                <!-- Add Button (visible on md and up only) -->
                                {{-- <div class="d-none d-md-flex justify-content-end">
                                    <a href="{{ route('admin.donation.export') }}" class="btn btn-primary">
                                        <span class="d-none d-sm-inline">{{ @trans('portal.export') }}</span> <i
                                            class="fa fa-file-excel-o"></i>
                                    </a>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 table-responsive">
                        @include('admin.attendance.view')
                    </div>
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

        // date selected then remove border color
        $('#date').change(function() {
            $('#date').removeClass('border-danger border-2');
        });

        // image preview
       $(document).on('click', '.status', function() {
            let $button = $(this);
            let status = $button.data('status');
            let date = $('#date').val();
            let labharthi_id = $button.data('labharthi-id');
            $('#status').val(status);
            $('#date').val(date);
            $('#labharthi_id').val(labharthi_id);

            if (date === '') {
                // alert('Please select a date and labharthi');
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 5000,
                })
                Toast.fire({
                    icon: 'warning',
                    text: "Please select a date",
                })

                // border color red of date field
                $('#date').addClass('border-danger border-2');
                return;
            }
            //    ajax call
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "POST",
                url: "{{ route('admin.attendance.store') }}",
                data: {
                    status: status,
                    date: date,
                    labharthi_id: labharthi_id,
                },
                success: function(response) {
                    console.log(response);
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 5000,
                    })
                    if (response.status === 200) {
                        console.log(status);

                        // Toast.fire({
                        //     icon: 'success',
                        //     text: response.message,
                        // })

                        // Replace button group with selected status icon/text
                        let $td = $button.closest('td');

                        let statusHtml = '';
                        if (status === 1) {
                            statusHtml =
                                `<span class="text-success"><i class="fa fa-check-circle"></i> {{ @trans('portal.present') }}</span>`;
                        } else if (status === 0) {
                            statusHtml =
                                `<span class="text-danger"><i class="fa fa-times-circle"></i> {{ @trans('portal.absent') }}</span>`;
                        } else if (status === 2) {
                            statusHtml =
                                `<span class="text-warning"><i class="fa fa-question-circle"></i> {{ @trans('portal.not_specified') }}</span>`;
                        }

                        $td.html(statusHtml); // Replace the button container with status label

                    } else {
                        Toast.fire({
                            icon: 'error',
                            text: response.message,
                        })
                    }
                },
            });
        });

        //search and filter
        function reloadTable() {
            let search_string = $('#search-val').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: "{{ route('admin.attendance.index') }}",
                data: {
                    search: search_string,
                },
                success: function(response) {
                    $('.table-responsive').html(response);
                },
            });
        }
    </script>
@endsection

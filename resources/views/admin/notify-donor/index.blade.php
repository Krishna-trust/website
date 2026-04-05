@extends('layouts.app')

@section('content')
<div class="page-header d-flex flex-wrap justify-content-between align-items-center my-0">
    <div>
        <h1 class="page-title">{{ @trans('messages.notify_donor') }}</h1>
    </div>
    <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex mt-3">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ @trans('messages.notify_donor') }}</li>
        </ol>
    </div>
</div>

<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card overflow-hidden customers">
            <div class="p-4 card-body">
                <div class="row d-md-flex justify-content-between align-items-center">
                    <div class="col-12 col-md-auto mb-2 mb-md-0 d-flex align-items-center">
                        <select id="selected_limit" onchange="reloadTable()" class="form-control form-select me-md-2" style="width: auto;">
                            <option value="10">10</option>
                            <option value="25">25</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="ms-2">Entries per page</span>
                    </div>

                    <div class="col-12 col-md-auto">
                        <div class="d-flex flex-column flex-md-row align-items-stretch">
                            <!-- Month Filter -->
                            <select id="month-filter" class="form-control form-select me-md-2" onchange="reloadTable()">
                                @for ($m = 1; $m <= 12; $m++)
                                    <option value="{{ sprintf('%02d', $m) }}" {{ sprintf('%02d', $m) == $month ? 'selected' : '' }}>
                                        {{ date('F', mktime(0, 0, 0, $m, 1)) }}
                                    </option>
                                @endfor
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mt-4" id="table-container">
                    @include('admin.notify-donor.view')
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script type="text/javascript">
    function reloadTable() {
        let month = $('#month-filter').val();
        let limit = $('#selected_limit').val();

        $.ajax({
            type: "GET",
            url: "{{ route('admin.notify-donor.index') }}",
            data: {
                month: month,
                limit: limit
            },
            success: function(response) {
                $('#table-container').html(response);
            },
            error: function(xhr) {
                console.error(xhr);
            }
        });
    }

    $(document).on('click', '.mark-done-btn', function() {
        let donationId = $(this).data('id');
        let btn = $(this);

        Swal.fire({
            title: 'Are you sure?',
            text: "This donor will no longer appear in the notification list for this period.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, mark as done!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "{{ route('admin.notify-donor.markAsDone') }}",
                    data: {
                        _token: "{{ csrf_token() }}",
                        donation_id: donationId
                    },
                    success: function(response) {
                        if (response.success) {
                            // Swal.fire(
                            //     'Success!',
                            //     response.message,
                            //     'success'
                            // );
                            // Hide the row
                            $('#donation-row-' + donationId).fadeOut(500, function() {
                                $(this).remove();
                                // Check if table is empty after removal
                                if ($('#logs-table tbody tr').length === 0) {
                                    reloadTable();
                                }
                            });
                        } else {
                            Swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
            }
        });
    });
</script>
@endsection

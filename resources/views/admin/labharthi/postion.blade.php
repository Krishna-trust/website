@extends('layouts.app')

@section('content')
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <style>
        #sortable {
            list-style-type: none;
            padding: 0;
        }

        .list-group-item {
            padding: 12px 16px;
            margin-bottom: 15px;
            border: 2px solid red;
            border-radius: 4px;
            background-color: #fff;
            cursor: move;
            transition: border-color 0.2s;
        }

        .ui-sortable-helper {
            border-color: red !important;
            background-color: #fff6f6;
        }

        .list-group-item:hover {
            border-color: #aaa;
        }
    </style>
    <div class="page-header d-flex flex-wrap justify-content-between align-items-center my-0">
        <div>
            <h1 class="page-title">{{ @trans('portal.labharthi') . ' ' . @trans('portal.position') }}</h1>
        </div>
        <div class="ms-auto pageheader-btn d-none d-xl-flex d-lg-flex mt-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.labharthi.index') }}">{{ @trans('portal.position') }}</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">{{ @trans('messages.labharthi') }}</li>
            </ol>
        </div>
        <div class="ms-auto pageheader-btn d-flex d-md-none mt-0">
            <a href="{{ route('admin.labharthi.index') }}" class="btn btn-secondary me-2">
                <span class="d-none d-sm-inline">{{ @trans('portal.back') }}</span> <i class="fa fa-arrow-left"></i>
            </a>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card overflow-hidden customers">
                <div class="p-4 card-body">
                    <div class="row d-md-flex justify-content-between align-items-center">
                        <ul id="sortable" class="list-group">
                            @foreach ($labharthis as $labharthi)
                                <li class="list-group-item" data-id="{{ $labharthi->id }}">
                                    {{ $labharthi->name }}

                                    @php
                                        $mobile = $labharthi->mobile_number;
                                        // Normalize: Remove all spaces first
                                        $mobile = str_replace(' ', '', $mobile);

                                        // Check if it starts with +91
                                        if (Str::startsWith($mobile, '+91')) {
                                            $formattedMobile = '+91 ' . substr($mobile, 3); 
                                        } else {
                                            $formattedMobile = '+91 ' . $mobile;
                                        }
                                    @endphp

                                    <span>{{ '( Mobile: ' .$formattedMobile . ' )' }}</span>
                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var el = document.getElementById('sortable');
            Sortable.create(el, {
                animation: 150,
                ghostClass: 'sortable-ghost',
                onEnd: function(evt) {
                    const order = Array.from(el.children).map(li => li.dataset.id);

                    fetch("{{ route('admin.labharthi.update-order') }}", {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                order
                            })
                        })
                        .then(r => r.json())
                        .then(response => {
                            if (response.success) {
                                // Swal.fire({
                                //     toast: true,
                                //     position: 'top-end',
                                //     icon: 'success',
                                //     text: 'Position updated',
                                //     timer: 3000,
                                //     showConfirmButton: false
                                // });
                                location.reload();
                            } else {
                                Swal.fire({
                                    toast: true,
                                    position: 'top-end',
                                    icon: 'error',
                                    text: 'Failed updating',
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            }
                        })
                        .catch(() => {
                            Swal.fire({
                                toast: true,
                                position: 'top-end',
                                icon: 'error',
                                text: 'Error updating position',
                                timer: 3000,
                                showConfirmButton: false
                            });
                        });
                }
            });
        });
    </script>
@endsection



{{-- <!DOCTYPE html>
<html>
<head>
    <title>Reorder Users</title>
    <link href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <style>
        #sortable { list-style-type: none; padding: 0; }
        .list-group-item { padding: 10px; margin-bottom: 5px; border: 1px solid #ddd; cursor: move; }
    </style>
</head>
<body>
    <div class="container mx-auto p-4">
        <h1 class="text-2xl mb-4">Reorder Users</h1>
        <ul id="sortable" class="list-group">
            @foreach ($labharthis as $labharthi)
                <li class="list-group-item" data-id="{{ $labharthi->id }}">
                    {{ $labharthi->name }} (Position: {{ $labharthi->position }})
                </li>
            @endforeach
        </ul>
    </div>

    <script>
        $(function() {
            $("#sortable").sortable({
                update: function(event, ui) {
                    let order = $(this).sortable('toArray', {attribute: 'data-id'});
                    $.ajax({
                        url: '{{ route("admin.labharthi.update-order") }}',
                        method: 'POST',
                        data: { order: order, _token: '{{ csrf_token() }}' },
                        success: function(response) {
                            if (response.success) {
                                alert('Order updated!');
                                location.reload();
                            }
                        },
                        error: function() {
                            alert('Error updating order.');
                        }
                    });
                }
            });
        });
    </script>
</body>
</html> --}}

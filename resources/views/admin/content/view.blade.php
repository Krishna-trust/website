<table class="table table-bordered border-bottom w-100 table-checkable no-footer " id="logs-table">
    <thead>
        <tr role="row">
            <th class="text-uppercase fw-bold" >#
            </th>
            <th class="text-uppercase fw-bold" >Image</th>
            <th class="text-uppercase fw-bold" >Upload Date</th>
            <th class="text-center text-uppercase fw-bold" >
                Actions </th>
        </tr>
    </thead>
    <tbody>
        @if ($contents->isEmpty())
        <tr>
            <td colspan="4" class="text-center text-danger">No content Found.</td>
        </tr>
        @else
        @forelse($contents as $index => $content)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>
                @if($content->image)
                <img src="{{ asset('storage/' . $content->image) }}"
                    alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                @else
                <img src="{{ asset('images/not_found.jpg') }}" alt="Profile" width="40px" style="border-radius: 4px; padding-right: 2px; padding-bottom: 4px;">
                @endif
            </td>
            <td>{{ date('d-m-Y', strtotime($content->upload_date)) }}</td>
            <td class="text-center">
                <div class="btn-group">
                    <a class="secondary edit-technician-btn me-2" href="{{ route('admin.contents.destroy', $content->id) }}"><i class="fa fa-edit"></i></a>
                    <a class="primary user-delete-btn" data-bs-toggle="modal" data-bs-target="#user-delete" data-user-id="{{ $content->id }}">
                        <i class="fa fa-trash-o"></i>
                    </a>
                    <!-- <div>
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
                    </div> -->
                </div>
            </td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>

<div class="d-md-flex justify-content-center">
    {{ $contents->links('admin.parts.pagination') }}
</div>

@forelse ($data as $index => $item)
    <tr>
        <td>{{ $index + 1 }}</td>
        <td>{{ $item->name }}</td>
        <td>{{ $item->price }}</td>
        <td>{{ $item->quantity }}</td>
        <td>{{ $item->type->name }}</td>
        <td>{{ $item->category->name }}</td>
        <td>{{ $item->supplier->name }}</td>
        <td><span class="badge bg-label-{{ $item->expiration_date > now() ? 'primary' : 'danger' }}"
                me-1">{{ $item->expiration_date }} - {{ $item->expiration_date > now() ? 'Valid' : 'Expired' }}
            </span>
        </td>
        <td><span
                class="badge bg-label-primary me-1">{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</span>
        </td>
        <td>
            <div class="dropdown">
                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i
                        class="bx bx-dots-vertical-rounded"></i></button>
                <div class="dropdown-menu">
                    <a class="dropdown-item btnEditForm" data-data="{{ $item }}" href="javascript:void(0);"
                        id="btnEditForm"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                    <a class="dropdown-item btnDeleteRow" data-id="{{ $item->id }}" href="javascript:void(0);"
                        id="btnDeleteRow"><i class="bx bx-trash me-1"></i> Delete</a>
                </div>
            </div>
        </td>
    </tr>
@empty
    <td colspan="10" class="text-center">No data Found.</td>
@endforelse

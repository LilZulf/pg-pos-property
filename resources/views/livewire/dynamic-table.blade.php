<div>
    <div class="d-flex justify-content-between mb-2">
        <input wire:model.live.debounce.300ms="search" type="text"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full pl-10 p-2 "
            placeholder="Search" required="">
        <div class="d-inline-flex align-items-center">
            <div class="m-2">Per page </div>
            <select wire:model.live.debounce.100ms="perPage" required=""
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 pl-2 pr-8 py-2">
                <option value="10">10</option>
                <option value="25">25</option>
                <option value="50">50</option>
                <option value="100">100</option>
            </select>
        </div>
    </div>


    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
        style="width:100%">
        <thead>
            <tr>
                @foreach ($columns as $column)
                    @if ($column['field'] === 'action')
                        <th class="d-flex justify-content-center">Action</th>
                    @else
                        <th wire:click="sortBy('{{ $column['field'] }}')">
                            {{ $column['name'] }}
                            @if ($sortField === $column['field'])
                                <span>{!! $sortAsc ? '&#8593;' : '&#8595;' !!}</span>
                            @endif
                        </th>
                    @endif
                @endforeach
            </tr>
        </thead>
        <tbody>
            @if ($data->isEmpty())
                <tr>
                    <td colspan="{{ count($columns) }}">No rows</td>
                </tr>
            @else
                @foreach ($data as $row)
                    <tr>
                        @foreach ($columns as $column)
                            @if ($column['field'] === 'status')
                                <td>
                                    @php
                                        $status = $row->{$column['field']};
                                        $badgeClass = '';
                                        switch ($status) {
                                            case 'Pending':
                                                $badgeClass = 'badge bg-warning';
                                                break;
                                            case 'Completed':
                                                $badgeClass = 'badge bg-success';
                                                break;
                                            case 'Cancelled':
                                                $badgeClass = 'badge bg-danger';
                                                break;
                                            default:
                                                $badgeClass = 'badge bg-secondary';
                                                break;
                                        }
                                    @endphp
                                    <span class="{{ $badgeClass }}">{{ $status }}</span>
                                </td>
                            @elseif ($column['field'] === 'action')
                                <td class="d-flex justify-content-center">
                                    <button type="button" id="offcanvasButton" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasExample{{ $row->id }}"
                                        aria-controls="offcanvasExample" data-data-to-pass="Data 1"
                                        class="btn btn-primary waves-effect waves-light"><i
                                            class="ri-eye-fill"></i></button>

                                    <a href="{{ route('transaction-edit', $row->id) }}"
                                        class="btn btn-warning btn-icon waves-effect waves-light mx-2"
                                        id="edit{{ $loop->iteration }}"><i class="ri-brush-2-fill"></i></a>
                                    {{-- <a href="{{ route('transaction-delete', $row->id) }}"
                                        class="btn btn-danger btn-icon waves-effect waves-light"
                                        data-confirm-delete="true"></a> --}}
                                    <form action="{{ route('transaction-delete', $row->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" data-confirm-delete="true">
                                            <i class="ri-delete-bin-5-fill"></i>
                                        </button>
                                    </form>
                                </td>
                            @else
                                <td>{{ $row->{$column['field']} }}</td>
                            @endif
                        @endforeach
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $data->links() }}

    @foreach ($data as $row)
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample{{ $row->id }}"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">Detail Data</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <div class="row">
                    <div class="d-flex">
                        <table class="table table-striped">
                            <tbody>
                                @foreach ($columns as $column)
                                    @if ($column['field'] !== 'action')
                                        <tr>
                                            <td>{{ $column['field'] }}</td>
                                            <td>{{ $row->{$column['field']} }}</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endforeach


</div>

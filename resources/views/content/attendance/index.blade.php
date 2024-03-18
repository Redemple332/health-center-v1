@extends('layouts/contentNavbarLayout')

@section('title', 'Attendance')

@section('page-script')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script> --}}
@endsection

@section('content')
    <h4 class="py-3 mb-4 fs-6">
        <span class="text-muted fw-light ">/</span> {{ $title }}
    </h4>

    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">{{ $title }}
            <button type="button" class="btn btn-primary gap-1 d-none" id="btnCreateForm"><i
                    class='bx bx-plus-circle'></i>Create</button>

        </h5>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Health Center</th>
                        <th>Name</th>
                        <th>Log-in</th>
                        <th>Log-out</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse ($attendanceToday as $i => $item)
                        <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{ $item->healthCenter->name }}</td>
                            <td>
                                {{ $item->user->full_name }}</td>
                            <td><span
                                    class="badge bg-label-success me-1">{{ \Carbon\Carbon::parse($item->time_in)->format('h:i A') }}</span>
                            </td>
                            <td><span
                                    class="badge bg-label-primary me-1">{{ $item->time_out ? \Carbon\Carbon::parse($item->time_out)->format('h:i A') : 'N/A' }}</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }} <span
                                    class="badge bg-label-primary me-1">{{ \Carbon\Carbon::parse($item->created_at)->isToday() ? 'Today' : '' }}</span>
                            </td>
                        </tr>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="7">No Record Found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <!--/ Striped Rows -->



@endsection

@extends('layouts/contentNavbarLayout')

@section('title', 'Dashboard - Analytics')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script>
        $('#health_center_id').change(function() {
            var selectedHealthCenter = $(this).val();
            window.location.href = "/?health_center=" + selectedHealthCenter;
        });
    </script>
@endsection

@section('content')

    @if (auth()->user()->role->name == 'Admin')
        <div class="row">
            <div class="col-3 mb-3">
                <label for="health_center_id" class="form-label">Health Center</label>
                <select class="form-select" id="health_center_id" name="health_center_id" aria-label="Default select example">
                    <option value="">Choose Health Center</option>
                    @forelse ($healthCenters as $item)
                        <option {{ $item->id == $healthCenter ? 'selected' : '' }} value="{{ $item->name }}">
                            {{ $item->name }}
                        </option>
                    @empty
                    @endforelse
                </select>
            </div>
        </div>
    @endif
    {{-- Small cards Row --}}
    <div class="row" style="grid-row-gap: 1.5rem">
        <div class="col">
            <div class="card" style="padding:1.5rem 1.8rem; height:100%; ">
                <div class="d-flex align-items-center justify-content-between ">
                    <span style="font-weight: 700; font-size:1.1rem; color:#8D8D8D">Patients</span>
                    <div style="background: #E8FADF; color:#71DD37; padding:.5rem; border-radius:8px;">
                        <i class='bx bx-user' style="font-size:3rem"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <h4 style="font-weight: 700; font-size:1.7rem; margin-bottom:5px">
                        {{ number_format($analytics['patientsCount']), 0 }}</h4>
                    <p style="">Total Number of Patients</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="padding:1.5rem 1.8rem; height:100%;">
                <div class="d-flex align-items-center justify-content-between ">
                    <span style="font-weight: 700; font-size:1.1rem; color:#8D8D8D">Records</span>
                    <div style="background: #DFF3FA; color:#37A1DD; padding:.5rem; border-radius:8px;">
                        <i class='bx bx-folder' style="font-size:3rem"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <h4 style="font-weight: 700; font-size:1.7rem; margin-bottom:5px">
                        {{ number_format($analytics['medicalRecordsCount']), 0 }}</h4>
                    <p style="">Overall Medical Records</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="padding:1.5rem 1.8rem; height:100%;">
                <div class="d-flex align-items-center justify-content-between ">
                    <span style="font-weight: 700; font-size:1.1rem; color:#8D8D8D">Inventory</span>
                    <div style="background: #F1DFFA; color:#9437DD; padding:.5rem; border-radius:8px;">
                        <i class='bx bx-capsule' style="font-size:3rem"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <h4 style="font-weight: 700; font-size:1.7rem; margin-bottom:5px">
                        {{ number_format($analytics['medicinesCount']), 0 }}</h4>
                    <p style="">Total Number of Medicines</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card" style="padding:1.5rem 1.8rem; height:100%;">
                <div class="d-flex align-items-center justify-content-between ">
                    <span style="font-weight: 700; font-size:1.1rem; color:#8D8D8D">Expired</span>
                    <div style="background: #FFBDB2; color:#FF2C08; padding:.5rem; border-radius:8px;">
                        <i class='bx bx-calendar-x' style="font-size:3rem"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <h4 style="font-weight: 700; font-size:1.7rem; margin-bottom:5px">
                        {{ number_format($analytics['expiredCount']), 0 }}</h4>
                    <p style="">Total Number of Expired Medicines</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Chart and Attendance --}}
    <div class="row mt-4" style="grid-row-gap: 1.5rem">
        {{-- <div class="col-lg-6">
            <div class="card p-4 d-flex" style="height: 100%">
                <div style="display: grid; place-items:center; height:100%">
                    Insert Chart Here
                </div>
            </div>
        </div> --}}
        <div class="col-lg-12">
            <div class="card p-4" style="min-height: 23rem">
                {{-- ATTENDANCE HERE --}}

                <div class="table-responsive text-nowrap">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Login</th>
                                <th>Logout</th>
                                <th>Action</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">

                            @forelse ($attendanceToday as $item)
                                <tr>
                                    <td>
                                        {{ $item->user->full_name }}</td>
                                    <td><span
                                            class="badge bg-label-success me-1">{{ \Carbon\Carbon::parse($item->time_in)->format('h:i A') }}</span>
                                    </td>
                                    <td><span
                                            class="badge bg-label-primary me-1">{{ $item->time_out ? \Carbon\Carbon::parse($item->time_out)->format('h:i A') : 'N/A' }}</span>
                                    </td>
                                    <td>
                                        <a {{ $item->status != 0 ? 'hidden' : '' }}
                                            href="{{ route('attendance.inOut', ['id' => $item->id]) }}"
                                            class="btn btn-primary gap-1" id="btnCreateForm"><i
                                                class='bx bx-time'></i>Confirm</a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr class="text-center">
                                    <td colspan="5">No Record Found</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

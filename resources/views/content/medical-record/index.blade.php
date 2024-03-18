@extends('layouts/contentNavbarLayout')

@section('title', 'Patients')

@section('page-script')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script> --}}
@endsection

@section('content')
    <h4 class="py-3 mb-4 fs-6">
        <span class="text-muted fw-light "></span> {{ $title }}
    </h4>
    <input type="hidden" name="url" id="url" value="{{ $url }}">
    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">{{ $title }}
            <button type="button" class="btn btn-primary gap-1" id="btnCreateForm"><i
                    class='bx bx-plus-circle'></i>Create</button>

        </h5>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Health Center</th>
                        <th>Patient</th>
                        <th>Medicine</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Purpose</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="table-content" class="table-border-bottom-0">
                    @include('content.medical-record.table')
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Striped Rows -->

    @include('content.medical-record.form')

@endsection

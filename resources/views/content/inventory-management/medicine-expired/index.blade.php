@extends('layouts/contentNavbarLayout')

@section('title', 'Inventory Management - Medicine Expired')

@section('page-script')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script> --}}
@endsection

@section('content')
    <h4 class="py-3 mb-4 fs-6">
        <span class="text-muted fw-light ">Inventory Management /</span> {{ $title }}
    </h4>
    <input type="hidden" name="url" id="url" value="{{ $url }}">
    <!-- Striped Rows -->
    <div class="card">
        <h5 class="card-header d-flex justify-content-between align-items-center">{{ $title }}
        </h5>

        <div class="table-responsive text-nowrap">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Supplier</th>
                        <th>Expiration Date</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="table-content" class="table-border-bottom-0">
                    @include('content.inventory-management.medicine-expired.table')
                </tbody>
            </table>
        </div>
    </div>

@endsection

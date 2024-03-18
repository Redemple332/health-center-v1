@extends('layouts/contentNavbarLayout')

@section('title', 'Expenses Report')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}">
@endsection

{{-- @section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
@endsection

@section('page-script')
    <script>
        let amount = {!! json_encode($amount, JSON_HEX_TAG) !!};
        let month = {!! json_encode($month, JSON_HEX_TAG) !!};
        console.log(month)
    </script>
    <script src="{{ asset('assets/js/sales-chart.js') }}"></script>
@endsection --}}

@section('content')
    <h4 class="py-3 mb-4 fs-6">
        <span class="text-muted fw-light "></span> {{ $title }}
    </h4>
    <!-- Striped Rows -->
    <div class="card">

        <div class="col">
            <div class="card" style="padding:1.5rem 1.8rem; height:100%;">
                <div class="d-flex align-items-center justify-content-between ">
                    <span style="font-weight: 700; font-size:1.1rem; color:#8D8D8D">Expenses Report</span>
                    <div style="background: #F1DFFA; color:#9437DD; padding:.5rem; border-radius:8px;">
                        <i class='bx bx-capsule' style="font-size:3rem"></i>
                    </div>
                </div>
                <div class="mt-2">
                    <h4 style="font-weight: 700; font-size:1.7rem; margin-bottom:5px">
                        {{ number_format($totalSales, 2) }}
                    </h4>
                    <p style="">Total Expenses this Month</p>
                </div>
            </div>
        </div>
    </div>
    <!--/ Striped Rows -->

@endsection

{{-- {
  "url": "tables/",
  "icon": "menu-icon tf-icons bx bxs-wallet",
  "name": "Financial",
  "slug": "tables-"
}, --}}

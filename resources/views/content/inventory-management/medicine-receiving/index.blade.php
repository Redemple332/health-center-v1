@extends('layouts/contentNavbarLayout')

@section('title', 'Inventory Management - {{$title}}')

@section('page-script')
<script src="{{asset('assets/js/app.js')}}"></script>
{{-- <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script> --}}
@endsection

@section('content')
<h4 class="py-3 mb-4 fs-6">
  <span class="text-muted fw-light ">Inventory Management /</span> {{$title}}
</h4>

<!-- Striped Rows -->
<div class="card">
  <h5 class="card-header d-flex justify-content-between align-items-center">{{$title}}
<button type="button" class="btn btn-primary gap-1" id="btnCreateForm" ><i class='bx bx-plus-circle'></i>Create</button>

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
          <th>Expiration Date</th>
          <th>Description</th>
          <th>Date Created</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
        <tr>
          <td>1</td>
          <td><i class="bx bxl-angular bx-sm text-danger me-3"></i> <span class="fw-medium">Angular Project</span></td>
          <td>Albert Cook</td>
          <td>Albert Cook</td>
          <td>Albert Cook</td>
          <td>Albert Cook</td>
          <td>Albert Cook</td>

          <td><span class="badge bg-label-primary me-1">Active</span></td>
          <td>
            <div class="dropdown">
              <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="bx bx-dots-vertical-rounded"></i></button>
              <div class="dropdown-menu">
                <a class="dropdown-item btnEditForm" data-data="1" href="javascript:void(0);" id="btnEditForm"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item btnDeleteRow" data-id="1" href="javascript:void(0);" id="btnDeleteRow"><i class="bx bx-trash me-1"></i> Delete</a>
              </div>
            </div>
          </td>
        </tr>

      </tbody>
    </table>
  </div>
</div>
<!--/ Striped Rows -->


@include('content.inventory-management.medicine-receiving.form')





@endsection

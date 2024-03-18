@extends('layouts/contentNavbarLayout')

@section('title', 'My Profile')

@section('page-script')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    {{-- <script src="{{asset('assets/js/dashboards-analytics.js')}}"></script> --}}
@endsection

@section('content')
    <h4 class="py-3 mb-4 fs-6">
        <span class="text-muted fw-light ">/</span> {{ $title }}
    </h4>
    <input type="hidden" name="url" id="url" value="{{ $url }}">

    <!-- Striped Rows -->
    <div class="card">
        <h6 hidden class="modal-title" id="formModalLabel">Edit Form</h6>

        <h5 class="card-header d-flex justify-content-between align-items-center">{{ $title }} Form
            {{-- <button type="button" class="btn btn-primary gap-1" id="btnCreateForm" ><i class='bx bx-plus-circle'></i>Create</button> --}}
        </h5>

        <form method="Post" id="form-modal">
            @csrf
            <div class="p-4">
                <div class="row">
                    <div class="col mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" id="first_name" name="first_name" class="form-control"
                            value="{{ $user->first_name }}" placeholder="Enter First Name">
                        <span class="invalid-feedback" role="alert">
                            <strong id="validation-first_name"></strong>
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" id="last_name" name="last_name" class="form-control"
                            value="{{ $user->last_name }}" placeholder="Enter Last Name">
                        <span class="invalid-feedback" role="alert">
                            <strong id="validation-last_name"></strong>
                        </span>
                    </div>
                </div>


                <div class="row">
                    <div class="col mb-3">
                        <label for="contact" class="form-label">Phone Number</label>
                        <input type="text" id="contact" name="contact" class="form-control"
                            value="{{ $user->contact }}" placeholder="Enter Phone Number">
                        <span class="invalid-feedback" role="alert">
                            <strong id="validation-contact"></strong>
                        </span>
                    </div>
                    <div class="col mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" id="email" name="email" value="{{ $user->email }}" class="form-control"
                            placeholder="Enter Email">
                        <span class="invalid-feedback" role="alert">
                            <strong id="validation-email"></strong>
                        </span>
                    </div>
                </div>

                <div class="row">
                    <div class="col mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" id="address" name="address" class="form-control"
                            value="{{ $user->address }}" placeholder="Enter Address">
                        <span class="invalid-feedback" role="alert">
                            <strong id="validation-address"></strong>
                        </span>
                    </div>
                </div>

                <input type="hidden" value="{{ $user->id }}" id="id" name="id">

                <div class="row mt-4">
                    <div class="col"></div>
                    <div class="col d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="button" class="btn btn-primary" id="btnSubmit">Save changes</button>
                    </div>
                </div>
            </div>
        </form>

    </div>
    <!--/ Striped Rows -->


@endsection

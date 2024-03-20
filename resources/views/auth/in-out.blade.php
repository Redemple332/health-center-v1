@extends('layouts/blankLayout')

@section('title', 'Login Basic - Pages')

@section('page-style')
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}">
@endsection

@section('page-script')
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize the Instascan scanner
            let scanner = new Instascan.Scanner({
                video: document.getElementById('scanner')
            });

            // Add a callback function to handle scanned QR codes
            scanner.addListener('scan', function(content) {

                if (content) {
                    $('#formModal').modal('show');
                    $('#qrcode').val(content);
                    $('#password').val("");
                }

            });

            // St art the camera and begin scanning
            Instascan.Camera.getCameras()
                .then(function(cameras) {
                    if (cameras.length > 0) {
                        scanner.start(cameras[0]); // Use the first camera
                    } else {
                        console.error('No cameras found.');
                    }
                })
                .catch(function(error) {
                    console.error(error);
                });
            $('#btnSubmit').on('click', function() {
                var btn = $(this);
                btn.prop('disabled', true); // Disable the button
                btn.html(
                    '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Saving...'
                ); // Change the text to indicate loading

                var content = $('#qrcode').val();
                var password = $('#password').val();

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `/login-qr-code`,
                    method: "POST",
                    data: {
                        qr_code: content,
                        password: password
                    },
                    success: function(data) {
                        const message = data.message;
                        Swal.fire({
                            title: message,
                            text: `Your successfully ${message}`,
                            icon: 'success'
                        });
                        btn.prop('disabled', false);
                        btn.html('Submit');
                        $('#formModal').modal('hide');
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        const message = error.message;
                        $('#formModal').modal('hide');
                        btn.prop('disabled', false);
                        btn.html('Submit');
                        Swal.fire({
                            title: "Login Error",
                            text: message,
                            icon: 'error'
                        });
                    }
                });
            })
        });
    </script>
@endsection

@section('content')
    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a href="{{ url('/') }}" class="app-brand-link gap-2">
                                <span class="app-brand-logo demo">@include('_partials.macros', [
                                    'width' => 100,
                                    'withbg' => 'var(--bs-primary)',
                                ])</span>
                                {{-- <span
                                    class="app-brand-text demo text-body fw-bold">{{ config('variables.templateName') }}</span> --}}
                            </a>
                        </div>
                        <video style="border-radius: 10px;" id="scanner" width="100%"></video>
                        <h4 class="text-center">Scan to Attendance</h4>
                        <div class="mb-3">
                            <a href="{{ route('login') }}" class="btn btn-primary d-grid w-100">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Register -->
        </div>
    </div>
    </div>

    <div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <form id="form-modal">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formModalLabel">Attendance</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" required id="password" name="password" class="form-control"
                                    placeholder="Enter Password">
                                <span class="invalid-feedback" role="alert">
                                    <strong id="validation-password"></strong>
                                </span>
                            </div>
                        </div>
                        <input type="hidden" value="" name="qrcode" id="qrcode">
                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnSubmit">Confirm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection

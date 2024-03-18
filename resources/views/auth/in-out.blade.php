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
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: `/login-qr-code`,
                    method: "POST",
                    data: {
                        qr_code: content,
                    },
                    success: function(data) {
                        const message = data.message;
                        Swal.fire({
                            title: message,
                            text: `Your successfully ${message}!`,
                            icon: 'success'
                        });
                    },
                    error: function(err) {
                        let error = err.responseJSON;
                        console.log(error);
                        alert("Invalid QR Code")
                    }
                });
            });

            // Start the camera and begin scanning
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
@endsection

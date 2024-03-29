@extends('layouts/contentNavbarLayout')

@section('title', 'Inventory Management - Users')

@section('page-script')
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '#btnCreateForm', function() {
                $("#qrcode").html("");
            });
            $(document).on('click', '.btnEditForm', function() {
                var qrCodeURL = $('#qr_code').val();
                var qr = new QRCode(document.getElementById("qrcode"), {
                    text: qrCodeURL,
                    width: 200,
                    height: 200,
                    colorDark: "#000000",
                    colorLight: "#ffffff",
                    correctLevel: QRCode.CorrectLevel.H
                });

                // Download QR code
                $("#downloadBtn").click(function() {
                    var last_name = $('#last_name').val();
                    var canvas = document.querySelector("#qrcode canvas");

                    // Create a new canvas for the padded QR code
                    var paddedCanvas = document.createElement('canvas');
                    paddedCanvas.width = canvas.width +
                        20; // Adding padding of 10 pixels on each side
                    paddedCanvas.height = canvas.height +
                        20; // Adding padding of 10 pixels on each side
                    var ctx = paddedCanvas.getContext('2d');

                    // Fill the padded canvas with white
                    ctx.fillStyle = '#ffffff';
                    ctx.fillRect(0, 0, paddedCanvas.width, paddedCanvas.height);

                    // Draw the original QR code onto the padded canvas
                    ctx.drawImage(canvas, 10, 10);

                    // Create a download link
                    var downloadLink = document.createElement('a');
                    downloadLink.setAttribute('download', last_name + '-QR.png');
                    downloadLink.setAttribute('href', paddedCanvas.toDataURL('image/png').replace(
                        /^data:image\/png/, 'data:application/octet-stream'));
                    downloadLink.click();












                    
                });
            });
        });
    </script>
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
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Date Created</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody id="table-content" class="table-border-bottom-0">
                    @include('content.users.table')
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Striped Rows -->
    @include('content.users.form')

@endsection

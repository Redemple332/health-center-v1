<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-modal">
                <div class="modal-header">
                    <h5 class="modal-title" id="formModalLabel">Create</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    @if (auth()->user()->role->name == 'Admin')
                        <div class="row">
                            <div class="col mb-3">
                                <label for="health_center_id" class="form-label">Health Center</label>

                                <select class="form-select" id="health_center_id" name="health_center_id"
                                    aria-label="Default select example">
                                    <option value="" disabled>Choose Health Center</option>
                                    @forelse ($healthCenters as $item)
                                        <option selected value="{{ $item->id }}">{{ $item->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                                <span class="invalid-feedback" role="alert">
                                    <strong id="validation-health_center_id"></strong>
                                </span>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col mb-3">
                            <label for="role_id" class="form-label">Role</label>
                            <select class="form-select" id="role_id" name="role_id"
                                aria-label="Default select example">
                                <option value="" disabled>Choose Role</option>
                                @forelse ($roles as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-role_id"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="first_name" class="form-label">First Name</label>
                            <input type="text" id="first_name" name="first_name" class="form-control"
                                placeholder="Enter First Name">
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-first_name"></strong>
                            </span>
                        </div>
                        <div class="col mb-3">
                            <label for="last_name" class="form-label">Last Name</label>
                            <input type="text" id="last_name" name="last_name" class="form-control"
                                placeholder="Enter Last Name">
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-last_name"></strong>
                            </span>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col mb-3">
                            <label for="contact" class="form-label">Phone Number</label>
                            <input type="text" id="contact" name="contact" class="form-control"
                                placeholder="Enter Phone Number">
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-contact"></strong>
                            </span>
                        </div>
                        <div class="col mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" id="email" name="email" class="form-control"
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
                                placeholder="Enter Address">
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-address"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Enter Password">
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-password"></strong>
                            </span>
                        </div>
                        <div class="col mb-3">
                            <label for="password_confirmation" class="form-label">Confirm Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="Confirm Password">
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-qr_code"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="col mb-12">
                        {{-- <label for="qr_code" class="form-label">QR Code</label>
                    <input type="text" id="qr_code" name="qr_code" class="form-control"
                        placeholder="Enter QR Code">
                    <span class="invalid-feedback" role="alert">
                        <strong id="validation-qr_code"></strong>
                    </span> --}}
                        <input type="hidden" id="qr_code" name="qr_code" class="form-control"
                            placeholder="Enter QR Code">
                        <div id="qrcode"></div>
                        <button class="btn btn-primary m-2" type="button" id="downloadBtn">Download QR
                            Code</button>
                    </div>

                    <input type="hidden" id="id" name="id">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="btnSubmit">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

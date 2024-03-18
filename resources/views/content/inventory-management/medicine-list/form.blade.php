<div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="formModalLabel">Create</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-modal">

                    <div class="row">
                        <div class="col mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" name="name" class="form-control"
                                placeholder="Enter Name">
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-name"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="medicine_type_id" class="form-label">Type</label>
                            <select class="form-select" id="medicine_type_id" name="medicine_type_id"
                                aria-label="Default select example">
                                <option value="" disabled>Choose Type</option>
                                @forelse ($types as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-medicine_type_id"></strong>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="medicine_category_id" class="form-label">Category</label>
                            <select class="form-select" id="medicine_category_id" name="medicine_category_id"
                                aria-label="Default select example">
                                <option value="" disabled>Choose Category</option>
                                @forelse ($categories as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-medicine_category_id"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="supplier_id" class="form-label">Supplier</label>
                            <select class="form-select" id="supplier_id" name="supplier_id"
                                aria-label="Default select example">
                                <option value="" disabled>Choose Supplier</option>
                                @forelse ($suppliers as $item)
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @empty
                                @endforelse
                            </select>
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-supplier_id"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input class="form-control" id="price" name="price" type="number" placeholder="0" />
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-price"></strong>
                            </span>
                        </div>
                        <div class="col mb-3">
                            <label for="quantity" class="form-label">Quantity</label>
                            <input class="form-control" type="number" name="quantity" placeholder="0" id="quantity" />
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-quantity"></strong>
                            </span>
                        </div>
                    </div>



                    <div class="row">
                        <div class="col mb-3">
                            <label for="expiration_date" class="form-label">Expiration Date</label>
                            <input class="form-control" id="expiration_date" name="expiration_date" type="date"
                                value="2021-06-18" />
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-expiration_date"></strong>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea id="description" name="description" class="form-control" placeholder="Enter Description" rows="4"></textarea>
                            <span class="invalid-feedback" role="alert">
                                <strong id="validation-description"></strong>
                            </span>
                        </div>
                    </div>
                    <input type="hidden" id="id" name="id">
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btnSubmit">Save changes</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

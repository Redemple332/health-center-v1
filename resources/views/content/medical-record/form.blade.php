  <div class="modal fade" id="formModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
              <form id="form-modal">
                  <div class="modal-header">
                      <h5 class="modal-title" id="formModalLabel">Create</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="row">
                          <div class="col mb-3">
                              <select class="form-select" id="patient_id" name="patient_id"
                                  aria-label="Default select example">
                                  <option value="" disabled>Choose Patient</option>
                                  @forelse ($patients as $item)
                                      <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                  @empty
                                  @endforelse
                              </select>
                              <span class="invalid-feedback" role="alert">
                                  <strong id="validation-patient_id"></strong>
                              </span>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col mb-3">
                              <label for="last_name" class="form-label">Medicine</label>
                              <select class="form-select" id="medicine_id" name="medicine_id"
                                  aria-label="Default select example">
                                  <option value="" disabled>Choose Medicine</option>
                                  @forelse ($medicines as $item)
                                      <option value="{{ $item->id }}">{{ $item->name }}</option>
                                  @empty
                                  @endforelse
                              </select>
                              <span class="invalid-feedback" role="alert">
                                  <strong id="validation-medicine_id"></strong>
                              </span>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col-4 mb-3">
                              <label for="quantity" class="form-label">quantity</label>
                              <input type="number" id="quantity" name="quantity" class="form-control"
                                  placeholder="Enter quantity">
                              <span class="invalid-feedback" role="alert">
                                  <strong id="validation-quantity"></strong>
                              </span>
                          </div>
                          <div class="col mb-9">
                              <label for="purpose" class="form-label">Purpose</label>
                              <input type="text" id="purpose" name="purpose" class="form-control"
                                  placeholder="Enter Purpose">
                              <span class="invalid-feedback" role="alert">
                                  <strong id="validation-purpose"></strong>
                              </span>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col">
                              <label for="description" class="form-label">Description <span>(Optional)</span></label>
                              <textarea id="description" name="description" class="form-control" placeholder="Enter Description" rows="2"></textarea>
                          </div>
                      </div>
                  </div>
                  <input type="hidden" id="id" name="id">
                  <div class="modal-footer">
                      <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary" id="btnSubmit">Save changes</button>
                  </div>
              </form>
          </div>
      </div>
  </div>

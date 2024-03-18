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
                              <label for="first_name" class="form-label">First Name</label>
                              <input type="text" id="first_name" name="first_name" class="form-control"
                                  placeholder="Enter First Name">
                              <span class="invalid-feedback" role="alert">
                                  <strong id="validation-first_name"></strong>
                              </span>
                          </div>
                      </div>
                      <div class="row">
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
                          <div class="col-4 mb-3">
                              <label for="age" class="form-label">Age</label>
                              <input type="number" id="age" name="age" class="form-control"
                                  placeholder="Enter Age">
                              <span class="invalid-feedback" role="alert">
                                  <strong id="validation-age"></strong>
                              </span>
                          </div>
                          <div class="col mb-3">
                              <label for="contact" class="form-label">Phone Number</label>
                              <input type="text" id="contact" name="contact" class="form-control"
                                  placeholder="Enter Phone Number">
                              <span class="invalid-feedback" role="alert">
                                  <strong id="validation-contact"></strong>
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

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
                              <label for="name" class="form-label">Name</label>
                              <input type="text" id="name" name="name" class="form-control is-invalid"
                                  placeholder="Enter Name">
                              <span class="invalid-feedback" role="alert">
                                  <strong id="validation-name"></strong>
                              </span>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col">
                              <label for="description" class="form-label">Description</label>
                              <textarea id="description" name="description" class="form-control" placeholder="Enter Description" rows="4"></textarea>
                              <span class="invalid-feedback" role="alert">
                                  <strong id="validation-description"></strong>
                              </span>
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

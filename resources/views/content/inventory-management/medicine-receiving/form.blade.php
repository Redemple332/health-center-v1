


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
                      <label for="health_center_id" class="form-label">Health Center</label>
                      <select class="form-select" id="health_center_id" name="health_center_id" aria-label="Default select example">
                        <option selected>Choose Health Center</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col mb-3">
                      <label for="patient_id" class="form-label">Patient</label>
                      <select class="form-select" id="patient_id" name="patient_id" aria-label="Default select example">
                        <option selected>Choose Patient</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col mb-3">
                      <label for="medicine_id" class="form-label">Medicine</label>
                      <select class="form-select" id="medicine_id" name="medicine_id" aria-label="Default select example">
                        <option selected>Choose Medicine</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                  </div>
                  </div>

                  <div class="row">
                    <div class="col mb-3">
                      <label for="quantity" class="form-label">Quantity</label>
                      <input class="form-control" type="number" name="quantity" placeholder="0" id="quantity" />
                    </div>

                     <div class="col mb-3">
                       <label for="expiration_date" class="form-label">Expiration Date</label>
                       <input class="form-control" id="expiration_date" name="expiration_date" type="date" value="2021-06-18"  />
                     </div>
                  </div>

                  <div class="row">
                      <div class="col mb-3">
                          <label for="description" class="form-label">Description</label>
                          <textarea id="description" name="description" class="form-control" placeholder="Enter Description" rows="4"></textarea>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" id="btnSubmit">Save changes</button>
              </div>
            </form>

          </div>
      </div>
  </div>

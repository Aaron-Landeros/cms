<div class="modal fade" id="contactDetailsModal">
    <div class="modal-dialog modal-dialog-slide-right modal-fullscreen">
        <div class="modal-content p-4">
            <form>
                <div class="modal-header">
                    <button class="btn-close" data-bs-dismiss="modal" id="btnCloseDetailsModal"></button>
                    <h1 class="modal-title fs-5 text-center w-100 "></h1>
                    <button class="btn btn-primary" value="Edit" id="btnEditContact">Edit</button>
                    <button class="btn btn-success d-none" id="btnConfirmEdit">Confirm</button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 text-center">
                        <h1 id="headerFullname"></h1>
                    </div>
                    <div class="mb-3 d-none" id="nameInput">
                        <label for="name" class="form-label fw-bold">Name</label>
                        <p id="detail_contact_fullname"></p>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label fw-bold">Email</label>
                        <p id="detail_contact_mail"></p>
                    </div>
                    <div class="mb-3">
                        <label for="mobile" class="form-label fw-bold">Mobile</label>
                        <p id="detail_contact_mobile"></p>
                    </div>
                    <div class="mb-3">
                        <label for="company" class="form-label fw-bold">Company</label>
                        <p id="detail_contact_company"></p>
                    </div>
                </div>
                <div class="text-center">
                    <h3 id="errorMessage" class="text-danger d-none">All fields must be filled out</h3>
                </div>
                <div class="modal-footer d-flex justify-content-center d-none" id="detailsModalFooter">
                    <button class="btn btn-warning w-50" data-bs-toggle="modal" data-bs-target="#deleteContactModal" id="deleteContactBtn" >Delete contact</button>
                </div>
            </form>
        </div>
    </div>
</div>

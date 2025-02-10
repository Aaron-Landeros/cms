<div class="modal fade" id="contact_modal" tabindex="-1" aria-labelledby="contactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable full-screen-modal">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-start align-items-center border-bottom-0 mb-2">
                <button type="button" class="btn-close me-auto" data-bs-dismiss="modal" aria-label="Close"></button>
                <button id="edit_contact" class="btn btn-secondary rounded fs-5">Edit</button>
            </div>
            <div class="modal-body" id="contact_details">
                <div class="name">
                    <label for="contact_fullname" class="form-label d-none">Name</label>
                    <input readonly type="text" class="form-control-plaintext mb-3 h1 text-center" id="contact_fullname">
                </div>
                <div class="mb-3">
                    <label for="contact_mobile" class="form-label mb-1 pb-1">Mobile</label>
                    <input readonly type="tel" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}" class="form-control-plaintext text-info mb-1" id="contact_mobile">
                </div>
                <div class="mb-3">
                    <label for="contact_email" class="form-label mb-1 pb-1">Email</label>
                    <input readonly type="email" class="form-control-plaintext text-info mb-1" id="contact_email">
                </div>
                <div class="mb-3">
                    <label for="contact_company" class="form-label mb-1 pb-1">Company</label>
                    <input readonly type="text" class="form-control-plaintext mb-1" id="contact_company">
                </div>
            </div>
            <div id="backdrop" class="d-none"></div>
            <div class="modal-footer border-top-0">
                <div id="sheet" class="d-none d-flex flex-column justify-content-center align-items-center w-100 pb-3 ps-3 pe-3">
                    <button id="confirm_delete" type="button" class="p-2 btn btn-light text-danger w-100 shadow-lg mb-3 bg-body-tertiary rounded">Delete Contact</button>
                    <button id="cancel_delete" type="button" class="p-2 btn btn-light text-info w-100 shadow-lg mb-2 bg-body-tertiary rounded fw-bold" data-bs-dismiss="toast">Cancel</button>
                </div>
                <button id="delete_contact" data-contact-id="" class="btn btn-warning text-dark w-100 ms-3 me-3" type="button">Delete Contact</button>
            </div>
        </div>
    </div>
</div>

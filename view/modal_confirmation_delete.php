<div class="modal fade" id="modal_confirmation_delete">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-4">
            <div class="container d-flex flex-column justify-content-center align-items-center">
                <div>
                    <h1>Are you sure you want to delete the contact?</h1>
                </div>
    
                <div class="d-flex flex-row justify-content-center">
                    <button class="btn btn-danger me-2" data-contact-id="<?= $contact_id ?>" id="confirm_delete">Yes, delete</button>
                    <button class="btn btn-secondary ms-2" data-bs-dismiss="modal" id="">Cancel</button>
                </div>

            </div>
        </div>
    </div>
</div>
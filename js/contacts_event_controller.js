$(function () {

    $(document).ready(function() {
        var user_request = 'fetch_all_contacts';

        $.post('controller/contacts_controller.php', {
            user_request: user_request
        }, function (data) {
            $('#contacts_results').html(data);
        });
    });

    //  search functionality
    $(document).on('input', '#searchInput', function() {
        var search_query = $(this).val().toLowerCase();

        $('#contacts_results tr').each(function() {
            var contact_name = $(this).find('td[data-col-type="contact_fullname"]').text().toLowerCase();

            if (contact_name.includes(search_query)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });


    //@ Al dar click en cerrar el modal de detalles
    $(document).on('click', '#btnCloseDetailsModal', function(e){
        e.preventDefault();
        $('#errorMessage').addClass('d-none');
        $('#detailsModalFooter').addClass('d-none');
        $('#nameInput').addClass('d-none');
        $('#headerFullname').removeClass('d-none');
        $('#btnEditContact').removeClass('d-none');
        $('#btnConfirmEdit').addClass('d-none');
        $('#contactDetailsModal').modal('hide');
    });

    //! Add contact
    $(document).on('submit', '#addNewContactForm', function(e) {
        e.preventDefault();

        if (!this.checkValidity()) {
            e.preventDefault();
            e.stopPropagation();
        } else {
            var user_request = 'add_contact';
            var contact_fullname = $('#contact_fullname').val();
            var contact_email = $('#contact_email').val();
            var contact_mobile = $('#contact_mobile').val();
            var contact_company = $('#contact_company').val();
            
            $.post('controller/contacts_controller.php', {
                user_request: user_request,
                contact_fullname: contact_fullname,
                contact_email: contact_email,
                contact_mobile: contact_mobile,
                contact_company: contact_company
            }, function(data) {  
                $('#contacts_results').prepend(data);
                $('#addContactModal').modal('hide');
                $('#addNewContactForm').removeClass('was-validated');
                $('#addNewContactForm').trigger('reset');
            });
        }

        $('#addNewContactForm').addClass('was-validated');
    });

    

    //! Mostrar los datos del contacto
    $(document).on('click', '.editable_contact', function(){
        var clicked_tr = $(this);
        var contact_name_cell = $(this).find('td[data-col-type="contact_fullname"]');
        var contact_id = clicked_tr.data('contact-id');
        var contact_fullname = clicked_tr.data('contact-fullname');
        var contact_mobile = clicked_tr.data('contact-mobile');
        var contact_mail = clicked_tr.data('contact-email');
        var contact_email = clicked_tr.data('contact-email'); 
        var contact_company = clicked_tr.data('contact-company');

        //? Poner los datos en cada etiqueta correspondiente
        $('#headerFullname').text(contact_fullname);
        $('#detail_contact_fullname').text(contact_fullname);
        $('#detail_contact_mobile').text(contact_mobile);
        $('#detail_contact_mail').text(contact_email); 
        $('#detail_contact_company').text(contact_company);

        $('#contactDetailsModal').modal('show');

        // storing reference to the row being edited
        var modal = $('#contactDetailsModal');
        modal.addClass('custom-slide-in');
        modal.modal('show').hide().fadeIn();

        // Storing reference to the row being edited
        modal.data('contactRow', $(this));

        // Remove the class after the modal is fully shown
        modal.on('shown.bs.modal', function () {
            modal.removeClass('custom-slide-in');
        });

        //! abrir modal de confirmacion
        $(document).on('click', '#deleteContactBtn', function(e) {
            e.preventDefault();
            var user_request = 'view_modal_confirmation';
            var contact_row = $('#contactDetailsModal').data('contactRow');
            var contact_id = contact_row.data('contact-id');

            $.post('controller/contacts_controller.php', {
                user_request: user_request,
                contact_id: contact_id
            }, function(data){
                $('#modal_content_confirmation').html(data);
                $('#modal_confirmation_delete').modal('show');
            })
        });

        //! Delete contact clicking deleteContactBtn
        $(document).on('click', '#confirm_delete', function(e) {
            e.preventDefault();
            var contact_row = $('#contactDetailsModal').data('contactRow');
            var user_request = 'delete_contact';
            var contact_id = $(this).data('contact-id');

            contact_row.remove();

            $('#contactDetailsModal').modal('hide');


            $.post('controller/contacts_controller.php', {
                user_request: user_request,
                contact_id: contact_id

            }, function(data){
                $('#modal_confirmation_delete').modal('hide');
                $('#errorMessage').addClass('d-none');
                $('#detailsModalFooter').addClass('d-none');
                $('#nameInput').addClass('d-none');
                $('#headerFullname').removeClass('d-none');
                $('#btnEditContact').removeClass('d-none');
                $('#btnConfirmEdit').addClass('d-none');
                $('#contactDetailsModal').modal('hide');
            })

        });


        //! Al dar click en el boton edit
        $('#btnEditContact').off('click').on('click', function(e){
            e.preventDefault();
            $('#contactDetailsModal').modal('show');
            $('#nameInput').removeClass('d-none');
            $('#headerFullname').addClass('d-none');
            $('#btnEditContact').addClass('d-none');
            $('#btnConfirmEdit').removeClass('d-none');
            $('#detailsModalFooter').removeClass('d-none');
    
            var contact_name_value = $('#detail_contact_fullname').text();
            var contact_mobile_value = $('#detail_contact_mobile').text();
            var contact_mail_value = $('#detail_contact_mail').text();
            var contact_company_value = $('#detail_contact_company').text();
    
            $('#detail_contact_fullname').html('<input type="text" data-contact-id="'+ contact_id +'" class="new_fullname_value" value="' + contact_name_value + '" required/>');
            $('#detail_contact_mobile').html('<input type="text" data-contact-id="'+ contact_id +'" class="new_mobile_value" value="' + contact_mobile_value + '" required/>');
            $('#detail_contact_mail').html('<input type="text" data-contact-id="'+ contact_id +'" class="new_mail_value" value="' + contact_mail_value + '" required/>');
            $('#detail_contact_company').html('<input type="text" data-contact-id="'+ contact_id +'" class="new_company_value" value="' + contact_company_value + '" required/>');
        
        });

        //todo para formatear el input 
        $(document).on('input', '.new_mobile_value', function() {
            var inputVal = $(this).val();
            //? Eliminar caracteres no numéricos
            var cleanedVal = inputVal.replace(/\D/g, '');
            
            //? Formatear con guiones
            var formattedVal = cleanedVal.replace(/(\d{3})(\d{3})(\d{4})/, '$1-$2-$3');
            
            //? Limitar a 12 caracteres (incluyendo guiones)
            formattedVal = formattedVal.substring(0, 12);
            
            $(this).val(formattedVal);
        });

        //! Actualizar contacto
        $('#btnConfirmEdit').off('click').on('click', function (e) {
            e.preventDefault();
            var user_request = 'edit_contact';
            var new_fullname_value = $('.new_fullname_value').val();
            var new_mobile_value = $('.new_mobile_value').val();
            var new_mail_value = $('.new_mail_value').val();
            var new_company_value = $('.new_company_value').val();

            if (!new_fullname_value || !new_mobile_value || !new_mail_value || !new_company_value) {
                $('#errorMessage').removeClass('d-none');
                return;
            } else {
                $('#errorMessage').addClass('d-none');
            }

            $.post('controller/contacts_controller.php', {
                user_request: user_request,
                contact_id: contact_id,
                new_fullname_value: new_fullname_value,
                new_mobile_value: new_mobile_value,
                new_mail_value: new_mail_value,
                new_company_value: new_company_value,
            }, function () {
                $(contact_name_cell).html(new_fullname_value);
                $('#errorMessage').addClass('d-none');
                $('#detailsModalFooter').addClass('d-none');
                $('#nameInput').addClass('d-none');
                $('#headerFullname').removeClass('d-none');
                $('#btnEditContact').removeClass('d-none');
                $('#btnConfirmEdit').addClass('d-none');
                $('#contactDetailsModal').modal('hide');
            }); 
        });

    });

    $(document).on('input', '#searchInput', function() {
        var search_query = $(this).val().toLowerCase();
        var user_request = 'search_contact_by_number';

        $.post('controller/contacts_controller.php', {
            user_request: user_request,
            search_query: search_query
        }, function (data) {
            $('#contacts_results').html(data);
        });
    });

});

<?php
require "../model/contacts_queries.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user_request = filter_input(INPUT_POST, 'user_request');
} else {
    $user_request = filter_input(INPUT_GET, 'user_request');
}



switch($user_request) {
    case 'fetch_all_contacts':
        $contacts = fetch_all_contacts();
        $current_letter = '';
        foreach($contacts as $contact):
            $contact_id = $contact['contact_id'];
            $contact_fullname = $contact['contact_fullname'];
            $contact_mobile = $contact['contact_mobile'];
            $contact_email = $contact['contact_email'];
            $contact_company = $contact['contact_company'];
            $first_letter = strtoupper($contact_fullname[0]);

            if($first_letter !== $current_letter) {
                $current_letter = $first_letter;
                include '../view/contact_row_divider.php';
            };

            include '../view/contacts_row_view.php';
        endforeach;
    break;

    case 'edit_contact':
        $contact_id = filter_input(INPUT_POST, 'contact_id');
        $contact_fullname = filter_input(INPUT_POST, 'new_fullname_value');
        $contact_mobile = filter_input(INPUT_POST, 'new_mobile_value');
        $contact_email = filter_input(INPUT_POST, 'new_mail_value');
        $contact_company = filter_input(INPUT_POST, 'new_company_value');
        $col_type = filter_input(INPUT_POST, 'col_type');
        edit_contact($contact_id, $contact_fullname, $contact_mobile, $contact_email, $contact_company);
    break;

    case 'delete_contact':
        $contact_id = filter_input(INPUT_POST, 'contact_id');
        delete_contact($contact_id);
    break;

    case 'view_modal_confirmation':
        $contact_id = filter_input(INPUT_POST, 'contact_id');

        include '../view/modal_confirmation_delete.php';
    break;
    case 'search_contact_by_number':
        $search_value = filter_input(INPUT_POST, 'search_query');
        $contacts = search_contact_by_number($search_value);
        $current_letter = '';
        foreach($contacts as $contact):
            $contact_id = $contact['contact_id'];
            $contact_fullname = $contact['contact_fullname'];
            $contact_mobile = $contact['contact_mobile'];
            $contact_email = $contact['contact_email'];
            $contact_company = $contact['contact_company'];
            $first_letter = strtoupper($contact_fullname[0]);

            if($first_letter !== $current_letter) {
                $current_letter = $first_letter;
                include '../view/contact_row_divider.php';
            };

            include '../view/contacts_row_view.php';
        endforeach;
}



?>
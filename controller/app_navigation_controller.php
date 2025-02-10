<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_link_request = filter_input(INPUT_POST, 'user_link_request');
} else {
    $user_link_request = filter_input(INPUT_GET, 'user_link_request');
}

switch ($user_link_request) {
    default:
        include '../view/contacts.php';
    break;
}
?>

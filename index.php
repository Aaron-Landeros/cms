<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../contact_management_system/css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" href="./img/icon.svg">
    <title>Contacts Management Systlem</title>
</head>
<body>

    <div class="main-container">
        <div class="app-content" id="app_content"></div>
    </div>
<?php include 'view/contact_details_modal.php' ?>
<?php include 'view/empty_modal.php' ?>
<!-- ========================================== Scripts ========================================== -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="./js/jquery-3.7.1.min.js"></script>
<script src="./js/contacts_event_controller.js"></script>
<script src="./js/app_navigation_controller.js"></script>
</body>
</html>
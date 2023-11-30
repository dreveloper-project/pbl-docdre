<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>header template</title>
    <link href="<?= BASE_URL ?>public/css/bootstrap.min.css" rel="stylesheet">
    <script src="<?= BASE_URL ?>public/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>public/js/jquery.js"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>public/fontawesome/css/font-awesome.min.css">

    <script src="<?= BASE_URL ?>public/datatables/datatables.js"></script>

    <script>
        $(document).ready(function() {
            $('#userTable').DataTable();
        });
    </script>

    
</head>

<body>
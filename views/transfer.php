<?php
require_once '../autoloader.php';

$transfer = new Transfer();

if (isset($_POST['export'])) {
    $transfer->export();
}

if (isset($_POST['import'])) {
    $transfer->import($_FILES["file"]);
}

?>

<!doctype html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="import" value="Import">
</form>

<br /><br />

<form action="" method="post">
    <input type="submit" name="export" value="Export">
</form>

</body>
</html>
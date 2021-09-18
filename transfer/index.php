<?php
require_once '../autoloader.php'; // autoloader.php dosyası daha önce çekilmediyse ve varsa getir yoksa hata ver

$transfer = new Transfer(); // Transfer class ile $transfer nesnesini oluştur

if (isset($_POST['export'])) // post methodu ile export değeri gönderildiyse
{
    $transfer->export(); // transfer nesnesindeki export'u çalıştır
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!--- Bootstrap - start --->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" />
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU"
            crossorigin="anonymous"
    />
    <!--- Bootstrap - end --->
    <title>Books App</title>
</head>
<body class="bg-light">
<!--- container - start --->
    <div class="container">
        <!--- import-result - start --->
        <div class="m-3 text-center">
            <?php
            if (isset($_POST['import'])) { // post methodu ile import değeri gönderildiyse
                $transfer->import($_FILES["file"]); // transfer nesnesindeki import fonksiyonunu $_FILES['file'] ile çalıştır
            }
            ?>
        </div>
        <!--- import-result - end --->

        <!--- import form - start --->
        <div class="d-flex bg-dark p-3 mb-2 text-light">
            IMPORT
        </div>
        <form action="" method="post" enctype="multipart/form-data">
            <input type="file" name="file" class="form-control">
            <input type="submit" name="import" class="form-control" value="Import">
        </form>
        <!--- import form - end --->

        <!--- export form - start --->
        <div class="d-flex bg-dark p-3 mb-2 mt-4 text-light">
            EXPORT
        </div>
        <form action="" method="post">
            <input type="submit" name="export" class="form-control" value="Export">
        </form>
        <!--- export form - end --->
    </div>
<!--- container - end --->
</body>
</html>
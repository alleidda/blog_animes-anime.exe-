<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://bootswatch.com/5/sandstone/bootstrap.min.css">
</head>

<body>
    <?php require_once("views/commons/menu.php"); ?>
    <?php $content ?>
    <div class="container">
        <h1 class="rounded border border-dark m-2 p-2 text-center text-white bg-info"><?= $titre ?></h1>
        <?php if (!empty($_SESSION['alert'])) : ?>
            <div class="alert <?= $_SESSION['alert']['type']?>" role="alert">
                <?= $_SESSION['alert']['message']?>
            </div>
        <?php 
            unset($_SESSION['alert']);
        endif ?>
        <?= $content ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>
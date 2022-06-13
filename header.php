<!doctype html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Smart Garbage!</title>
</head>

<nav class="navbar bg-success  navbar-light">
    <div class="container-fluid">
        <span class="text-white navbar-brand mb-0 h1">Smart Garbage</span>
        <?php if (isset($_SESSION['username'])) {
            echo <<<EOT
            <a href="./logout.php"><button class="btn btn-danger" type="submit">Logout</button></a>
            EOT;
        } ?>
    </div>

</nav>
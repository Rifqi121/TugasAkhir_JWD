<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect to login if not logged in
    exit();
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pariwisata</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
            <div class="container">
                <a class="navbar-brand" href="?page=beranda">Pariwisata</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <?php
                        $page = isset($_GET['page']) ? $_GET['page'] : 'beranda';
                        ?>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page == 'beranda') ? 'active' : ''; ?>"
                                href="?page=beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page == 'paket') ? 'active' : ''; ?>"
                                href="?page=paket">Paket Wisata</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo ($page == 'pesanan') ? 'active' : ''; ?>"
                                href="?page=pesanan">Pesanan</a>
                        </li>
                        <?php if(isset($_SESSION['email'])): ?>
                        <li class="nav-item">
                            <a class="nav-link text-danger" href="logout.php">Logout (<?php echo $_SESSION['name']; ?>)</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Carousel -->
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators d-none">
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active" style="background-image: url('images/destinasi1.jpg');">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Destinasi 1</h5>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('images/destinasi2.jpg');">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Destinasi 2</h5>
                    </div>
                </div>
                <div class="carousel-item" style="background-image: url('images/destinasi3.jpg');">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Destinasi 3</h5>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                <span class="sr-only">Next</span>
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
        </div>
    </header>
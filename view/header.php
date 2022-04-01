<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->


    <link rel="stylesheet" href="view/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <title>E-stationery</title>
    <link rel="stylesheet" href="view/style.css">

    \


    <!-- Font Family link-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600&display=swap" rel="stylesheet">



    <!-- ==============================Bootstrap Icon CDN Link===============================================-->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

</head>

<body>

    <nav class="navbar navbar-expand-lg ">
        <div class="container">
            <a class="navbar-brand" href="#">
                <span style="color: orangered;">E</span>-Stationery
                <img src="#" alt=""></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?php echo $base_url ?>?r=home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo $base_url ?>?r=contact">Contact</a>
                    </li>

                    </a>

                </ul>
                <form class="d-flex">
                    <input class="form-control search me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn" type="button">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <script src="view/bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>

</body>

</html>
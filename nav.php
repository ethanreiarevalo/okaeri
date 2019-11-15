<head>
    <style>
        a:hover{
            color:#ffc107 !important;
        }
    </style>
</head>
<nav class="navbar navbar-expand-sm navbar-light bg-dark text-white">
    <a href="index.php"><img src="image/OKAERI.png" alt=""></a>
    <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
        aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavId">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0 text-white">

            <li class="nav-item">
                <a class="nav-link text-white-50" href="mangalist.php">Manga<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white-50" href="lnlist.php">Light Novels</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white-50" href="login.php">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white-50" href="register.php">Sign Up!</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" action="search.php" method="post">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" name="search">
            <button class="btn btn-outline-warning my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
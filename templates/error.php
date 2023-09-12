<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Eat Homepage</title>
    <link rel="stylesheet" href="../style.css">
    <!-- <link rel="stylesheet" href="icomoon/style.css"/> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script type="text/javascript" src="templates/functions/helpers.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Borel&family=Chivo:wght@200;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <h1>Let's Eat</h1>
        <div class="header-nav">
        <!-- <span class="icon-menu"></span> -->
            <nav class="show-nav">
                <ul>
                    <li><a href="./home">home</a></li>
                    <li><a href="./upload">upload recipe</a></li>
                    <li><a href="./browse">browse recipes</a></li>
                </ul>
            </nav>
            <!-- <span class="icon-search"></span> -->
            <form id="nav-search" class="nav-search show-search" method="get" action="./browse?searchterm={$searchterm}">
                <input type="text" name="searchterm" placeholder="search for a recipe">
                <button type="submit">Go!</button>
            </form>
        </div>
    </header>
    <div class="main">
        <div class="error">
            <h1>Oops! This page does not exist </h1>
            <h3><a href="./home">Go Home</a></h3>
        </div>
    </div>
</body>
</html>
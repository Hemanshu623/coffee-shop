<?php
    require('navbar.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Image Layout</title>
    <style>
    @import url("https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Outfit:wght@100..900&family=Pacifico&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&family=Outfit:wght@100..900&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Arizonia&family=Oswald:wght@200..700&family=Outfit:wght@100..900&family=Pacifico&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@100..900&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");
    @import url("https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Caveat:wght@400..700&family=Kalam:wght@300;400;700&family=Outfit:wght@100..900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap");

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    html,
    body {
        background-color: #fffbf2;
        overflow-x: hidden;
    }

    ::-webkit-scrollbar {
        display: none;
    }

    .blog-container {
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 20px;
        flex-wrap: wrap;
    }

    .blog-post {
        background: white;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        margin: 20px;
        overflow: hidden;
        width: 500px;
        transition: transform 0.3s ease;
        height: 400px;
    }

    .blog-post:hover {
        transform: translateY(-5px);
    }

    .post-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .post-image:hover {
        transform: scale(1.05);
    }

    .post-title {
        font-size: 1.5em;
        margin: 10px;
    }

    .post-excerpt {
        font-size: 1em;
        color: #555;
        margin: 10px;
    }

    .read-more {
        display: inline-block;
        margin: 10px;
        padding: 10px 15px;
        background-color: #6f4c3e;
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .read-more:hover {
        background-color: #5b3e30;
    }

    .first {
        height: 100vh;
        width: 100vw;
        background: url(../img/homeBg.webp) no-repeat center center/cover;
        background-attachment: fixed;
    }

    .mainmenu {
        height: 100vh;
        width: 100%;
        background: url(../img/b3.webp) no-repeat center center/cover;
        background-attachment: fixed;
    }

    .overlay1 {
        height: 100%;
        width: 100%;
        background-color: rgba(0, 0, 0, 0.338);
        display: flex;
        justify-content: center;
        align-items: center;
        color: white;
        flex-direction: column;
    }

    .overlay1 .p2 {
        color: #c7a17a;
        font-family: "Pacifico", "Lobster", "Dancing Script", cursive;
        font-size: 50px;
        font-weight: 400;
        margin-bottom: -19px;
    }

    .overlay1 .menu-h1 {
        text-transform: uppercase;
        font-size: 107px;
        font-family: "Bebas Neue", sans-serif;
        font-weight: 500;
    }

    .linebg {
        background: url(../img/bg-header-overlay-lg.webp) no-repeat top center/cover;
        position: absolute;
        top: 597px;
        height: 150px;
        width: 100%;
    }
    </style>
</head>

<body>
    <div class="mainmenu">
        <div class="overlay1">
            <p class="p2">Our</p>
            <h1 class="menu-h1">Blog</h1>
        </div>
    </div>

    <div class="linebg"></div>
    <div class="blog-container">
        <article class="blog-post">
            <img src="img/b3.webp" alt="Coffee Post 1" class="post-image" />
            <h2 class="post-title">The Perfect Brew: A Guide to Coffee</h2>
            <p class="post-excerpt">
                Explore the art of brewing coffee to perfection. Discover tips and
                tricks from our baristas!
            </p>
            <a href="#" class="read-more">Read More</a>
        </article>

        <article class="blog-post">
            <img src="img/b2.webp" alt="Coffee Post 2" class="post-image" />
            <h2 class="post-title">Coffee Origins: From Bean to Cup</h2>
            <p class="post-excerpt">
                Learn about the fascinating journey of coffee from its origins to your
                cup.
            </p>
            <a href="#" class="read-more">Read More</a>
        </article>

        <article class="blog-post">
            <img src="img/b3.webp" alt="Coffee Post 3" class="post-image" />
            <h2 class="post-title">Brewing Methods: Which One is Right for You?</h2>
            <p class="post-excerpt">
                Dive into different brewing methods and find the one that suits your
                taste!
            </p>
            <a href="#" class="read-more">Read More</a>
        </article>
        <br /><br />

        <article class="blog-post">
            <img src="img/b2.webp" alt="Coffee Post 1" class="post-image" />
            <h2 class="post-title">The Perfect Brew: A Guide to Coffee</h2>
            <p class="post-excerpt">
                Explore the art of brewing coffee to perfection. Discover tips and
                tricks from our baristas!
            </p>
            <a href="#" class="read-more">Read More</a>
        </article>

        <article class="blog-post">
            <img src="img/b2.webp" alt="Coffee Post 2" class="post-image" />
            <h2 class="post-title">Coffee Origins: From Bean to Cup</h2>
            <p class="post-excerpt">
                Learn about the fascinating journey of coffee from its origins to your
                cup.
            </p>
            <a href="#" class="read-more">Read More</a>
        </article>

        <article class="blog-post">
            <img src="img/b3.webp" alt="Coffee Post 3" class="post-image" />
            <h2 class="post-title">Brewing Methods: Which One is Right for You?</h2>
            <p class="post-excerpt">
                Dive into different brewing methods and find the one that suits your
                taste!
            </p>
            <a href="#" class="read-more">Read More</a>
        </article>
    </div>
</body>

</html>
<?php
require('footer.php');
?>
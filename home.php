<?php
require('navbar.php');
// Assuming this is inside a PHP template or a view file

$hotCoffees = [
    [
        'name' => 'CAFE AMERICANO',
        'description' => 'Espresso shots topped with hot water',
        'oldPrice' => '$7',
        'currentPrice' => '$9',
        'imageUrl' => 'img/hm1.webp'
    ],
    [
        'name' => 'CAPPUCCINO',
        'description' => 'Dark espresso lies in wait under milk foam',
        'oldPrice' => '',
        'currentPrice' => '$9',
        'imageUrl' => 'img/hm2.webp'
    ],
    [
        'name' => 'ESPRESSO',
        'description' => 'Signature Espresso Roast with rich flavor',
        'oldPrice' => '',
        'currentPrice' => '$5',
        'imageUrl' => 'img/hm3.webp'
    ],
    [
        'name' => 'CARAMEL MACCHIATO',
        'description' => 'Freshly steamed milk with vanilla-flavored syrup',
        'oldPrice' => '',
        'currentPrice' => '$9',
        'imageUrl' => 'img/hm4.webp'
    ],
    [
        'name' => 'CAFFE MOCHA',
        'description' => 'Full-bodied espresso combined with mocha',
        'oldPrice' => '$6',
        'currentPrice' => '$7',
        'imageUrl' => 'img/hm5.webp'
    ]
];

$coldCoffees = [
    [
        'name' => 'ICED COFFEE WITH MILK',
        'description' => 'Iced Coffee Blend with milk served chilled',
        'oldPrice' => '$7',
        'currentPrice' => '$9',
        'imageUrl' => 'img/cm1.webp'
    ],
    [
        'name' => 'ICED ESPRESSO',
        'description' => 'Smooth signature Espresso Roast over ice begets',
        'oldPrice' => '',
        'currentPrice' => '$9',
        'imageUrl' => 'img/cm2.webp'
    ],
    [
        'name' => 'ICED CARAMEL MACCHIATO',
        'description' => 'Signature caramel crosshatch and a mocha drizzle',
        'oldPrice' => '',
        'currentPrice' => '$7',
        'imageUrl' => 'img/cm3.webp'
    ],
    [
        'name' => 'FLAT MILK',
        'description' => 'Fresh brewed coffee and steamed milk',
        'oldPrice' => '',
        'currentPrice' => '$9',
        'imageUrl' => 'img/cm4.webp'
    ],
    [
        'name' => 'ICED LATTE',
        'description' => 'Signature espresso are intentionally combined over ice',
        'oldPrice' => '',
        'currentPrice' => '$6',
        'imageUrl' => 'img/cm5.webp'
    ]
];

 $images = [
    "img/img-gallery-1.webp",
    "img/img-gallery-2.webp",
    "img/ourpassion2.webp",
    "img/ourpassion1.webp",
    "img/craft-coffee.webp",
    "img/home-fifth-1.webp",
    "img/home-fifth-2.webp",
    "img/home-third-2.webp",
    "img/home-third-1.webp",
    "img/home-third-3.webp",
    "img/home-fifth-1.webp",
    "img/aboutBg.webp",
    "img/home-fifth-bg.webp",
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/home.css">
</head>

<body>
    <div class='first'>
        <div class="overlay">
            <p class='p1'>*</p>
            <p class='p2'>The Power of</p>
            <h1 class='home-h1'>Coffee</h1>
            <h4 class='home-h4'>* since 2000 *</h4>
        </div>
    </div>

    <div class='second-main'>
        <div class="main">
            <div class="second-small-1"></div>
            <div class="second-small-2"></div>
            <div class="second-small-3"></div>
            <div class="second-small-4"></div>
            <div class="bgup"></div>
            <div class="passion-section">
                <div class="top-section">
                    <div class="image-and-text">
                        <img src="img/ourpassion1.webp" alt="Coffee being brewed" class="main-image" />
                        <div class="text-overlay">OUR&nbsp;PASSIONS</div>
                    </div>
                    <div class="quote">
                        <div class="line"></div>
                        <p class='quote-p'>A CUP OF GOURMET COFFEE SHARED WITH A FRIEND IS HAPPINESS TASTED AND TIME WELL SPENT.</p>
                    </div>
                </div>
                <div class="bottom-section">
                    <div class="image-and-description">
                        <p class="description">
                            Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth et 8-bit kale chips proident chillwave deep v laborum. Aliquip veniam delectus, Marfa eiusmod Pinterest in do umami readymade swag. Selfies iPhone Kickstarter, drinking vinegar.
                        </p>
                        <p class="signature"><img src="img/signature-1.webp" alt="" /><br /><span>CEO & Founder Craft Coffee</span></p>
                    </div>
                    <div class="line2"></div>
                    <div class="bottom-section-img">
                        <img src="img/ourpassion2.webp" alt="Coffee and croissants" class="secondary-image" />
                    </div>
                </div>
            </div>
            <div class="bgdown"></div>
            <div class="craft-coffee">
                <div class="overlay">
                    <p class='homesecond-p2'>Storg of</p>
                    <h1 class='homesecond-h1'>craft Coffee</h1>
                </div>
            </div>
        </div>
    </div>


    <div class='homethird'>
        <div class="bgup1"></div>
        <div class="third-small-1"></div>
        <div class="third-small-2"></div>
        <div class="third-small-3"></div>
        <div class="third-small-4"></div>
        <div class="third-line"></div>
        <div class="third-first">
            <div class="left"></div>
            <div class="right">
                <p class="thrid-right-p">The first cup is for the guest, the second for enjoyment, the third for the sword</p>
            </div>
        </div>
        <div class="third-second">
            <div class="th1">
                <p>
                    Exercitation photo booth stumptown tote bag Banksy, elit small batch freegan sed. Craft beer elit seitan exercitation, photo booth.
                </p>
                <img src="img/home-third-4.webp" alt="" />
            </div>
            <div class="th2">
                <div class="th2-h2-1">Delightful</div>
                <div class="th2-h2-2">Expereience</div>
                <img src="img/home-third-3.webp" alt="" />
            </div>
            <div class="th3"></div>
        </div>
    </div>



    <div class="home-fourth">
        <div class="fourth-hero">
            <div class="menu">
                <div class="fourth-small-1"></div>
                <div class="fourth-small-2"></div>
                <div class="fourth-line"></div>
                <div class="text">
                    <p class="home-fourth-h4">Our</p>
                    <p class="home-fourth-h1">MENUS</p>
                </div>
                <div class="chlmenu">
                    <div class="chlmenu1">
                        <h1 class="h1">HOT COFFEES</h1>
                        <?php foreach ($hotCoffees as $item): ?>
                            <div class="cold">
                                <div class="menu-item">
                                    <img src="<?php echo $item['imageUrl']; ?>" alt="<?php echo $item['name']; ?>" class="menu-item-image" />
                                    <div class="menu-item-text">
                                        <div class="menu-item-name"><?php echo $item['name']; ?></div>
                                        <div class="menu-item-description"><?php echo $item['description']; ?></div>
                                    </div>
                                    <div class="menu-item-price">
                                        <span class="menu-item-old-price"><?php echo $item['oldPrice']; ?></span>
                                        <span class="menu-item-current-price"><?php echo $item['currentPrice']; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="chlmenu2">
                        <h1 class="h1">COLD COFFEES</h1>
                        <?php foreach ($coldCoffees as $item): ?>
                            <div class="hot">
                                <div class="menu-item">
                                    <img src="<?php echo $item['imageUrl']; ?>" alt="<?php echo $item['name']; ?>" class="menu-item-image" />
                                    <div class="menu-item-text">
                                        <div class="menu-item-name"><?php echo $item['name']; ?></div>
                                        <div class="menu-item-description"><?php echo $item['description']; ?></div>
                                    </div>
                                    <div class="menu-item-price">
                                        <span class="menu-item-old-price"><?php echo $item['oldPrice']; ?></span>
                                        <span class="menu-item-current-price"><?php echo $item['currentPrice']; ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <button class="btn"><a href="#">Our Menu</a></button>
            </div>
        </div>
    </div>

    <div class='home-fifth'>
        <div class="bgupfifth"></div>
        <div class="fifth-main">
            <div class="box"><img src="img/home-fifth-1.webp" alt="" /></div>
            <div class="box"><img src="img/home-fifth-2.webp" alt="" /></div>
            <div class="fifth-contain">
                <h1 class="fifth-h1">Coffee at its <p class='fifth-p'> the best</p>
                </h1>
                <p class="fifth-p">Nesting close by to our Tiroran Estate, these legendary birds are the inspiration behind our family-owned Whitetail brand. Just like its namesake, </p>
                <button class="fifth-btn">learn more about us</button>
            </div>
        </div>
        <div class="bgdownfifth"></div>
    </div>


    <div class="home-sixth-container">
        <div class="sixthbg-down"></div>
        <div class="sixth-small-1"></div>
        <div class="sixth-small-2"></div>
        <div class="home-sixth">
            <div class="sixth-hero">
                <div class="sixth-line"></div>
                <h4 class="home-sixth-h4">Our</h4>
                <h1 class="home-sixth-h1">GALLERY</h1>
            </div>
        </div>
        <div class="slider">
            <div class="slider-wrapper">
                <?php foreach ($images as $image): ?>
                    <div class="slide">
                        <img src="<?php echo $image; ?>" alt="" />
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <div class="insta">
            <a href="" class=""><i class="fab fa-instagram"></i>&nbsp;@craftcoffee</a>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js" integrity="sha512-onMTRKJBKz8M1TnqqDuGBlowlH0ohFzMXYRNebz+yOcc5TQr/zAKsthzhuv0hiyUKEiQEQXEynnXCvNTOk50dg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="homescript.js"></script>
</body>

</html>
<?php
    require('footer.php');
?>
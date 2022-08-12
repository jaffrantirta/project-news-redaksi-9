<div class="mycontainer container-sm">
    <div class="koepoekoepoe-banner">
        <img class="products-x-recipes-banner" height="300px" width="100%"
             src="<?php echo base_url(); ?>/public/images/slide_produk.jpg">
        <div class="koepoekoepoe-banner-content">
            <div class="product-borderleft">
                <h1 class="visible-lg visible-md">Our products</h1>
                <h2 class="visible-sm visible-xs">Our products</h2>
                <p class="visible-lg visible-md">Explore our wide variety of flavors and find<br>your perfect ingredient
                </p>
            </div>
        </div>
    </div>
    <hr>
    <div class="container text-center">
        <h5>DISCOVER PRODUCTS BY :</h5>
        <div class="visible-lg visible-md">
            <a href="<?php echo base_url() ?>products" class="btn btn-round btn-product"
               style="color: black; text-decoration: none; outline: none">All PRODUCTS</a>
            <?php
            foreach ($produk_kategori as $kategori)
            {
                echo '<a href="' . base_url() . 'products/by/' . $kategori->ID_PRODUK_KATEGORI . '" class="btn btn-round btn-product" style="color: black;text-decoration: none; outline:none">' . $kategori->NAMA_PRODUK_KATEGORI . '</a>';
            }
            ?>

        </div>
        <div class="visible-sm visible-xs">
            <div class="dropdown">
                <button class="btn-lg btn-round-lg btn-product" type="button" data-toggle="dropdown"
                        style="width: 90%; text-align: left; padding: 3% %5; outline: none"><?php echo($nama_kategori ? ($nama_kategori->NAMA_PRODUK_KATEGORI ? $nama_kategori->NAMA_PRODUK_KATEGORI : 'ALL PRODUCTS') : 'ALL PRODUCTS'); ?>
                    <span class="pull-right fa fa-caret-down"></span></button>
                <ul class="dropdown-menu" style="width: 90%;position: absolute;margin-left: 5%;margin-right: 5%;">
                    <li><a href="<?php echo base_url() ?>products">All PRODUCTS</a></li>
                    <?php
                    foreach ($produk_kategori as $kategori)
                    {
                        echo '<li><a href="' . base_url() . 'products/by/' . $kategori->ID_PRODUK_KATEGORI . '">' . $kategori->NAMA_PRODUK_KATEGORI . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
        <hr>
        <div class="container for-infinite-parent">
            <div class="for-infinite">
            <?php
            if ($products)
            {
                if (sizeof($products) == 1)
                {
                    echo '<div class="owl-carousel owl-theme text-center">';
                    echo '<div>';
                    echo '<a href="' . base_url() . '/products/details/' . $products[0]->ID_PRODUK . '">
                    <img src="' . base_url() . 'uploads/' . $products[0]->FOTO . '">
                            </a>';
                    echo '<h4>' . ($this->session->lang === "en" ? $products[0]->EN_NAMA_PRODUK : $products[0]->NAMA_PRODUK) . '</h4>';
                    echo '</div>';
                    echo '</div>';
                } else
                {
                    $index = 0;
                    $size = sizeof($products);
                    foreach ($products as $product)
                    {
                        if ($index == 0)
                        {
                            echo '<div class="owl-carousel owl-theme text-center">';
                            echo '<div>';
                            echo '<a href="' . base_url() . '/products/details/' . $product->ID_PRODUK . '">
                    <img src="' . base_url() . 'uploads/' . $product->FOTO . '">
                            </a>';
                            echo '<h4>' . ($this->session->lang === "en" ? $product->EN_NAMA_PRODUK : $product->NAMA_PRODUK) . '</h4>';
                            echo '</div>';
                            $index ++;
                            if ($products[$size - 1] == $product)
                                echo '</div>';
                        } else if ($index < 4)
                        {
                            echo '<div>';
                            echo '<a href="' . base_url() . '/products/details/' . $product->ID_PRODUK . '">
                    <img src="' . base_url() . 'uploads/' . $product->FOTO . '">
                            </a>';
                            echo '<h4>' . ($this->session->lang === "en" ? $product->EN_NAMA_PRODUK : $product->NAMA_PRODUK) . '</h4>';
                            echo '</div>';
                            $index ++;
                            if ($products[$size - 1] == $product)
                                echo '</div>';
                            if ($index > 3)
                            {
                                echo '</div>';
                                $index = 0;
                            }
                        }
                    }
                }
            } else
            {
                echo '<h3 class="text-center">Sorry the products are currently not available</h3>';
            }
            ?>
            </div>
            <hr>
            <?php
            if($pages>1)
            echo '<div class="text-center">
                <button class="btn koepoekoepoe-red btn-round koepoekoepoe-infinite-btn">LOAD MORE</button>
                <button class="btn koepoekoepoe-red btn-round koepoekoepoe-loading-btn" style="display: none"><i class="fa fa-circle-o-notch fa-spin"></i> Retrieving</button>
            </div>';
            ?>
        </div>
        <hr>
    </div>
    <script>
        $('.owl-carousel').owlCarousel({
            margin: 30,
            navText: ["<span></span>", "<span></span>"],
            mouseDrag: false,
            touchDrag: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    mouseDrag: true,
                    touchDrag: true
                },
                600: {
                    items: 4,
                    nav: false,
                    mouseDrag: true,
                    touchDrag: true
                },
                1000: {
                    items: 4,
                    nav: false,
                }
            }
        });
    </script>
</div>
<div style="display: none">
    <?php
        for($i=1;$i<$pages;$i++)
        {
            echo '<p class="pages">' . $i . '</p>';
        }
    ?>
    <p id="kategori"><?php if($products) echo $products[0]->ID_PRODUK_KATEGORI?></p>
</div>
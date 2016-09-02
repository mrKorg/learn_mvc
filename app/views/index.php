<?php include_once "app/views/header.php"; ?>

<!--    <div class="jumbotron">-->
<!--        <h1 class="display-3">Jumbotron heading</h1>-->
<!--        <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>-->
<!--        <p><a class="btn btn-lg btn-success" href="#" role="button">Sign up today</a></p>-->
<!--    </div>-->

    <div class="row marketing">
        <h3 class="col-xs-12 text-center">Last news</h3><br><br>
        <?php foreach ($news as $key => $new): ?>
            <div class="col-xs-12 col-md-4">
                <h4><a href="/news/article/<?php echo $new["alias"]; ?>"><?php echo $new["title"]; ?></a></h4>
                <p><?php echo $textShort = mb_substr($new["content"],0,150,'UTF-8') . "..."; ?></p>
            </div>
            <?php if ($key == 2) { break; } ?>
        <?php endforeach; ?>
        <div class="col-xs-12"><hr></div>
    </div>

    <div class="row marketing">
        <h3 class="col-xs-12 text-center">Last products</h3><br><br>
        <?php foreach ($products as $key => $product): ?>
            <div class="col-xs-12 col-md-4">
                <h4><a href="/catalog/product/<?php echo $product["alias"] ?>"><?php echo $product["title"] ?></a></h4>
                <p class="sku">АРТ-<?php echo $product["sku"]; ?></p>
                <p class="price">
                    Цена:
                    <?php if ($product["old_price"]) : ?><span class="old"><?php echo $product["old_price"]; ?></span><?php endif; ?>
                    <strong><span><?php echo $product["price"] ?></span> грн</strong>
                </p>
                <p><?php echo $textShort = mb_substr($product["info"],0,150,'UTF-8') . "..."; ?></p>
            </div>
            <?php if ($key == 2) { break; } ?>
        <?php endforeach; ?>
        <div class="col-xs-12"><hr></div>
    </div>

    <div class="row marketing">
        <h3 class="col-xs-12 text-center">Categories</h3><br><br>
        <?php foreach ($categories as $key => $category): ?>
            <div class="col-xs-12 col-md-4">
                <h4><a href="/catalog/category/<?php echo $category["cat_alias"]; ?>"><?php echo $category["cat_title"]; ?></a></h4>
                <p><?php echo $textShort = mb_substr($category["cat_description"],0,150,'UTF-8') . "..."; ?></p>
            </div>
            <?php if ($key == 2) { break; } ?>
        <?php endforeach; ?>
        <div class="col-xs-12"><hr></div>
    </div>

<?php include_once "app/views/footer.php"; ?>
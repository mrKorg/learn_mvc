<?php include_once "app/views/header.php"; ?>

    <div class="row marketing">
        <div class="col-xs-12 col-md-3">
            <ul>
                <?php foreach ($categories as $cat): ?>
                    <li><a href="/catalog/category/<?php echo $cat["cat_alias"]; ?>"><?php echo $cat["cat_title"]; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-xs-12 col-md-9">
            <?php foreach ($category as $item): ?>
                <h1><?php echo $item["cat_title"]; ?></h1>
                <p><?php echo $item["cat_description"]; ?></p>
                <div class="row">
                    <?php foreach ($products as $product): ?>
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
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

<?php include_once "app/views/footer.php"; ?>
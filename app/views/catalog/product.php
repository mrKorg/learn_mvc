<?php include_once "app/views/header.php"; ?>

    <div class="row marketing">
        <div class="col-xs-12 col-md-3">
            <ul>
                <?php foreach ($categories as $category): ?>
                    <li><a href="/catalog/category/<?php echo $category["cat_alias"]; ?>"><?php echo $category["cat_title"]; ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="col-xs-12 col-md-9">
            <?php foreach ($product as $product): ?>
                <h1><?php echo $product["title"]; ?></h1>
                <p class="sku">АРТ-<?php echo $product["sku"]; ?></p>
                <p class="price">
                    Цена:
                    <?php if ($product["old_price"]) : ?><span class="old"><?php echo $product["old_price"]; ?></span><?php endif; ?>
                    <strong><span><?php echo $product["price"] ?></span> грн</strong>
                </p>
                <h3>Характеристики</h3>
                <p><?php echo $product["info"] ?></p>
                <h3>Описание</h3>
                <p><?php echo $product["content"]; ?></p>
            <?php endforeach; ?>
        </div>
    </div>

<?php include_once "app/views/footer.php"; ?>
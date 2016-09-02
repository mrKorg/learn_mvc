<?php include_once "app/views/header.php"; ?>

    <div class="row marketing">
        <h1 class="col-xs-12">Catalog</h1>
        <?php foreach ($categories as $category): ?>
            <div class="col-xs-12 col-md-4">
                <h2><a href="/catalog/category/<?php echo $category["cat_alias"]; ?>"><?php echo $category["cat_title"]; ?></a></h2>
                <p><?php echo $textShort = mb_substr($category["cat_description"],0,150,'UTF-8') . "..."; ?></p>
            </div>
        <?php endforeach; ?>
    </div>

<?php include_once "app/views/footer.php"; ?>
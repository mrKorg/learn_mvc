<?php include_once "app/views/header.php"; ?>

    <?php foreach ($post as $item): ?>
    <div class="row">
        <div class="col-xs-12">
            <h1><?php echo $item["title"]; ?></h1>
            <hr>
            <div><?php echo $item["date_create"] ?></div>
            <div>
                <?php echo $item["content"] ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

<?php include_once "app/views/footer.php"; ?>
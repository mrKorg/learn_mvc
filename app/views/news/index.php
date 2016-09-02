<?php include_once "app/views/header.php"; ?>

    <div class="row">
        <div class="col-xs-12">
            <h1>Новости</h1>
            <hr>
        </div>
    </div>
    <div class="row">
        <?php
        $count = 0;
        foreach ($news as $new): ?>
            <div class="col-xs-12 col-md-6">
                <h2><a href="/news/article/<?php echo $new["alias"]; ?>"><?php echo $new["title"]; ?></a></h2>
                <p><?php echo $textShort = mb_substr($new["content"],0,150,'UTF-8') . "..."; ?></p>
            </div>
            <?php
            $count++;
            if($count%2 == 0): ?>
                </div><div class="row">
            <?php endif;
        endforeach; ?>
    </div>

<?php include_once "app/views/footer.php"; ?>
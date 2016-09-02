<?php
include_once "head.php";
if(isset($_POST["add_product"])){
    $product_title = trim($_POST["title"]);
    $product_alias = trim($_POST["alias"]);
    $product_cat = trim($_POST["category"]);
    $product_price = trim($_POST["price"]);
    $product_old_price = trim($_POST["old_price"]);
    $product_sku = trim($_POST["sku"]);
    $product_info = trim($_POST["info"]);
    $product_content = trim($_POST["content"]);
    $product = new Products();
    $product_alias = $product_alias = $product->set_product($product_title, $product_alias, $product_cat, $product_price, $product_old_price, $product_sku, $product_info, $product_content);
    header("Location: /admin/edit-product/".$product_alias);
}
include_once "header.php";
include_once "sidebar.php";
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/admin"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">News</li>
                <li class="active">Add product</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add product</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Product title</label>
                                <input id="title" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <table class="alias" id="alias">
                                    <tr>
                                        <td><label>Alias</label></td>
                                        <td id="server"><?php echo $_SERVER['SERVER_NAME']; ?>/news/</td>
                                        <td>
                                            <input name="alias" id="alias_input" class="form-control" required value="">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    <?php foreach ($categories as $category): ?>
                                        <option value="<?php echo $category["cat_id"]?>"><?php echo $category["cat_title"]; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <label>Price</label>
                                        <input type="number" min="1" name="price" class="form-control" required>
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <label>Old price</label>
                                        <input type="number" min="1" name="old_price" class="form-control">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <label>Article number</label> *(АРТ-)
                                        <input type="text" name="sku" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Short info</label>
                                <textarea name="info" class="form-control" rows="5" required></textarea>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control" rows="10" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add_product" class="btn btn-primary">Add product</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->

    </div>	<!--/.main-->

<?php include_once "footer.php"; ?>
<?php
include_once "head.php";
if(isset($_POST["delete"])){
    $delete_id = $_POST["toolbar1"];
    $products = new Products();
    $products->delete_product($delete_id);
    header("Location: /admin/products/");
}
include_once "header.php";
include_once "sidebar.php";
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/admin"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Products</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Products</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <form class="panel panel-default form" method="post">
                    <div class="panel-heading">
                        <a href="/admin/add-product" class="btn btn-primary">Add product</a>
                        <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-delete" style="display: none">
                        <input type="hidden" name="delete_id">
                    </div>
                    <div class="panel-body">
                        <table id="products_table"
                               data-toggle="table"
                               data-show-refresh="false"
                               data-show-toggle="false"
                               data-show-columns="false"
                               data-search="true"
                               data-select-item-name="toolbar1[]"
                               data-pagination="true"
                               data-page-list="[5, 10, 20, 50, 100, 200]"
                               data-sort-name="name"
                               data-sort-order="desc">
                            <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true" >Item ID</th>
                                    <th data-field="title" data-sortable="true">Product title</th>
                                    <th data-field="cat_title" data-sortable="true">Category</th>
                                    <th data-field="sku" data-sortable="true">Артикул</th>
                                    <th data-field="price" data-sortable="true">Price</th>
                                    <th data-field="id" data-sortable="true">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td></td>
                                    <td><a href="/admin/edit-product/<?php echo $product["alias"]; ?>"><?php echo $product['title']; ?></a></td>
                                    <td><a href="/admin/edit-category/<?php echo $product["cat_alias"]; ?>"><?php echo $product['cat_title']; ?></a></td>
                                    <td>АРТ-<?php echo $product["sku"]?></td>
                                    <td><?php echo $product['price']; ?></td>
                                    <td><?php echo $product['id']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div><!--/.row-->

    </div>	<!--/.main-->

<?php include_once "footer.php"; ?>
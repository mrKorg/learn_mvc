<?php
include_once "head.php";
if(isset($_POST["delete"])){
    $delete_id = $_POST["toolbar1"];
    $category = new Categories();
    $category->delete_category($delete_id);
    header("Location: /admin/categories/");
}
include_once "header.php";
include_once "sidebar.php";
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/admin"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Categories</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Categories of products</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <form class="panel panel-default form" method="post">
                    <div class="panel-heading">
                        <a href="/admin/add-category" class="btn btn-primary">Add category</a>
                        <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-delete" style="display: none">
                        <input type="hidden" name="delete_id">
                    </div>
                    <div class="panel-body">
                        <table id="categories_table" class="table"
                               data-toggle="table"
                               data-show-refresh="false"
                               data-show-toggle="false"
                               data-show-columns="false"
                               data-search="true"
                               data-select-item-name="toolbar1[]"
                               data-sort-name="name"
                               data-sort-order="desc"
                               data-pagination="true"
                               data-page-list="[5, 10, 20, 50, 100, 200]">
                            <thead>
                                <tr>
                                    <th data-field="state" data-checkbox="true">Category ID</th>
                                    <th data-field="title" data-sortable="true">Category title</th>
                                    <th data-field="description" data-sortable="true">Category description</th>
                                    <th data-field="id" data-sortable="true">ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($categories as $category): ?>
                                    <tr>
                                        <td></td>
                                        <td><a href="/admin/edit-category/<?php echo $category["cat_alias"]; ?>"><?php echo $category['cat_title']; ?></a></td>
                                        <td><?php echo $textShort = mb_substr($category['cat_description'],0,150,'UTF-8') . "..."; ?></td>
                                        <td><?php echo $category['cat_id']; ?></td>
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
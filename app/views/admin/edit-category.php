<?php
include_once "head.php";
if(isset($_POST["save_category"])){
    $category_id = trim($_POST["id"]);
    $category_title = trim($_POST["title"]);
    $category_alias = trim($_POST["alias"]);
    $category_description = trim($_POST["description"]);
    $category = new Categories();
    $category_alias = $category->update_category($category_id, $category_title, $category_alias, $category_description);
    header("Location: /admin/edit-category/".$category_alias);
}
include_once "header.php";
include_once "sidebar.php";
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/admin"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">Categories</li>
                <li class="active">Edit category</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit category</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Category title</label>
                                <input id="title" name="title" class="form-control" required value="<?php echo $category[0]["cat_title"] ?>">
                            </div>
                            <div class="form-group">
                                <table class="alias" id="alias">
                                    <tr>
                                        <td><label>Url</label></td>
                                        <td id="server">http://<?php echo $_SERVER['SERVER_NAME']; ?>/news/</td>
                                        <td>
                                            <input name="alias" id="alias_input" class="form-control" required value="<?php echo $category[0]["cat_alias"] ?>">
                                            <input type="hidden" name="id" value="<?php echo $category[0]["cat_id"] ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="description" class="form-control" rows="10" required><?php echo $category[0]["cat_description"] ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="save_category" class="btn btn-primary">Save category</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->

    </div>	<!--/.main-->

<?php include_once "footer.php"; ?>
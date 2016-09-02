<?php
include_once "head.php";
if(isset($_POST["delete"])){
    $delete_id = $_POST["toolbar1"];
    $news = new News();
    $news->delete_post($delete_id);
    header("Location: /admin/news/");
}
include_once "header.php";
include_once "sidebar.php";
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/admin"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">News</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">News</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <form class="panel panel-default form" method="post">
                    <div class="panel-heading">
                        <a href="/admin/add-news" class="btn btn-primary">Add post</a>
                        <input type="submit" value="Delete" name="delete" class="btn btn-danger btn-delete" style="display: none">
                        <input type="hidden" name="delete_id">
                    </div>
                    <div class="panel-body">
                        <table data-toggle="table"
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
                                    <th data-field="state" data-checkbox="true">Item ID</th>
                                    <th data-field="title" data-sortable="true">Item title</th>
                                    <th data-field="content" data-sortable="true">Item content</th>
                                    <th data-field="id" data-sortable="true">Item ID</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($news as $new): ?>
                                <tr>
                                    <td></td>
                                    <td><a href="/admin/edit-news/<?php echo $new["alias"]; ?>"><?php echo $new['title']; ?></a></td>
                                    <td><?php echo $textShort = mb_substr($new['content'],0,150,'UTF-8') . "..."; ?></td>
                                    <td><?php echo $new['id']; ?></td>
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
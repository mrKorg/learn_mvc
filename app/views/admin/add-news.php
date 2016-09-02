<?php
include_once "head.php";
if(isset($_POST["add_post"])){
    $news_title = trim($_POST["title"]);
    $news_alias = trim($_POST["alias"]);
    $news_content = trim($_POST["content"]);
    $news = new News();
    $news_alias = $news->set_post($news_title, $news_alias, $news_content);
    header("Location: /admin/edit-news/".$news_alias);
}
include_once "header.php";
include_once "sidebar.php";
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/admin"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">News</li>
                <li class="active">Add post</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Add post</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Post title</label>
                                <input id="title" name="title" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <table class="alias" id="alias">
                                    <tr>
                                        <td><label>Url</label></td>
                                        <td id="server">http://<?php echo $_SERVER['SERVER_NAME']; ?>/news/</td>
                                        <td>
                                            <input name="alias" id="alias_input" class="form-control" required value="">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control" rows="10" required></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="add_post" class="btn btn-primary">Add post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->

    </div>	<!--/.main-->

<?php include_once "footer.php"; ?>
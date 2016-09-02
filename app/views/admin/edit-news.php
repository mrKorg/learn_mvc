<?php
include_once "head.php";
if(isset($_POST["save_post"])){
    $post_id = trim($_POST["id"]);
    $post_title = trim($_POST["title"]);
    $post_alias = trim($_POST["alias"]);
    $post_content = trim($_POST["content"]);
    $news = new News();
    $post_alias = $news->update_post($post_id, $post_title, $post_alias, $post_content);
    header("Location: /admin/edit-news/".$post_alias);
}
include_once "header.php";
include_once "sidebar.php";
?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="/admin"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                <li class="active">News</li>
                <li class="active">Edit post</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit post</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Post title</label>
                                <input id="title" name="title" class="form-control" required value="<?php echo $post[0]["title"]; ?>">
                                <input type="hidden" name="id" value="<?php echo $post[0]["id"] ?>">
                            </div>
                            <div class="form-group">
                                <table class="alias" id="alias">
                                    <tr>
                                        <td><label>Url</label></td>
                                        <td id="server">http://<?php echo $_SERVER['SERVER_NAME']; ?>/news/</td>
                                        <td>
                                            <input name="alias" id="alias_input" class="form-control" required value="<?php echo $post[0]["alias"]; ?>">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="form-group">
                                <label>Content</label>
                                <textarea name="content" class="form-control" rows="10" required><?php echo $post[0]["content"]; ?></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="save_post" class="btn btn-primary">Save post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/.row-->

    </div>	<!--/.main-->

<?php include_once "footer.php"; ?>
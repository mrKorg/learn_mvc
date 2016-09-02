<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lumino - Dashboard</title>

    <link href="/assets/admin/css/bootstrap.min.css" rel="stylesheet">
<!--    <link href="/assets/admin/css/datepicker3.css" rel="stylesheet">-->
<!--    <link href="/assets/admin/css/bootstrap-table.css" rel="stylesheet">-->
    <link rel="stylesheet" href="/bower_components/bootstrap-table/dist/bootstrap-table.min.css">
    <link href="/assets/admin/css/styles.css" rel="stylesheet">


    <!--Icons-->
    <script src="/assets/admin/js/lumino.glyphs.js"></script>

    <!--[if lt IE 9]>
    <script src="/assets/admin/js/html5shiv.js"></script>
    <script src="/assets/admin/js/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/admin/"><span>Perfect</span> Admin</a>
            <?php if(isset($_SESSION["id"])): ?>
            <form class="user-menu" method="post" style="margin-top: 8px; margin-left: 10px;">
                <div class="pull-right">
                    <button type="submit" name="logout" class="btn btn-danger"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</button>
                </div>
            </form>
            <?php endif; ?>
            <a target="_blank" class="btn btn-success pull-right" style="margin-top: 8px;" href="/">Go site</a>
        </div>

    </div><!-- /.container-fluid -->
</nav>
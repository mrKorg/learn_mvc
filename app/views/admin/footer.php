
        <script type="text/javascript" src="/bower_components/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="/bower_components/jquery-migrate/jquery-migrate.min.js"></script>
        <script type="text/javascript" src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!--        <script type="text/javascript" src="/assets/admin/js/chart.min.js"></script>-->
<!--        <script type="text/javascript" src="/assets/admin/js/chart-data.js"></script>-->
<!--        <script type="text/javascript" src="/assets/admin/js/easypiechart.js"></script>-->
<!--        <script type="text/javascript" src="/assets/admin/js/easypiechart-data.js"></script>-->
<!--        <script type="text/javascript" src="/assets/admin/js/bootstrap-datepicker.js"></script>-->
<!--        <script type="text/javascript" src="/assets/admin/js/bootstrap-table.js"></script>-->
        <script type="text/javascript" src="/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
        <script type="text/javascript" src="/assets/admin/js/jquery.liTranslit.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function($) {

//                $('#calendar').datepicker({});

                !function ($) {
                    $(document).on("click","ul.nav li.parent > a > span.icon", function(){
                        $(this).find('em:first').toggleClass("glyphicon-minus");
                    });
                    $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
                }(window.jQuery);

                $(window).on('resize', function () {
                    if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
                });
                $(window).on('resize', function () {
                    if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
                });
                
                if($("#alias")){
                    $("#title").on("input", function () {
                        $("#title").liTranslit({
                            elAlias: $("#alias_input")
                        });
                    });
                    $("#alias_input").liTranslit({
                        elAlias: $("#alias_input")
                    });
                }


                $(".table").on('check.bs.table', function (e, row, $el) {
                    $el.val(row["id"]);
                    var a = $(".table").find("input:checked");
                    if(a.length > 0){
                        $(".btn-delete").show();
                    } else {
                        $(".btn-delete").hide();
                    }
                })
                .on('uncheck.bs.table', function (e, row, $el) {
                    $el.val("");
                    var a = $(".table").find("input:checked");
                    if(a.length > 0){
                        $(".btn-delete").show();
                    } else {
                        $(".btn-delete").hide();
                    }
                })

                
            });
        </script>
    </body>

</html>

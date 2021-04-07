

<!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js
    <script src="../../plugins/bootstrap-select/js/bootstrap-select.js"></script> -->
    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <script src="../../plugins/bootstrap-notify/bootstrap-notify.js"></script>
    <!-- Jquery CountTo Plugin Js -->
    <script src="../../plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="../../plugins/raphael/raphael.min.js"></script>
    <script src="../../plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="../../plugins/chartjs/Chart.bundle.js"></script>

    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="../../plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/ui/animations.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <script type="text/javascript">
        function checkMain(x) {
            var checked = $(x).prop('checked');
            $('.cbxMain').prop('checked', checked)
            $('tr:visible').each(function () {
                $(this).find('.chk_delete').each(function () {
                    this.checked = checked;
                });
            });
        }


        $(document).ready(function (){
        $('.chk_delete').click(function () {
            if ($('.chk_delete:checked').length == $('.chk_delete').length) {
                $('.cbxMain').prop('checked', true);
            }
            else {
                $('.cbxMain').prop('checked', false);
            }

            $('#check-all').click(function(){
                $("input:checkbox").attr('checked', true);
              });
        });
        });

        function checkMainsent(x) {
            var checked = $(x).prop('checked');
            $('.cbxMainsent').prop('checked', checked)
            $('tr:visible').each(function () {
                $(this).find('.chk_deletesent').each(function () {
                    this.checked = checked;
                });
            });
        }


        $(document).ready(function (){
        $('.chk_deletesent').click(function () {
            if ($('.chk_deletesent:checked').length == $('.chk_deletesent').length) {
                $('.cbxMainsent').prop('checked', true);
            }
            else {
                $('.cbxMainsent').prop('checked', false);
            }

            $('#check-all').click(function(){
                $("input:checkbox").attr('checked', true);
              });
        });

        $('.no-print').hide();

    });

    </script>

</body>

</html>

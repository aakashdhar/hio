
  </div>
<!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; <?= date('Y') ?> <a href="amigosas.com">hiO ! Solutions</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<script type="text/javascript"
     src="https://maps.googleapis.com/maps/api/js?sensor=false&key=AIzaSyBmBBDd9eIbjruPE9_2A-64kttSbj6amlc&libraries=places">
 </script>
<!-- AdminLTE App -->
<script src="dist/js/app.js"></script>
<script src="dist/js/alltables.js" charset="utf-8"></script>
<script src="dist/js/jquery.placepicker.js" charset="utf-8"></script>
<script type="text/javascript">
    $(document).ready(function()
    {
    	$(".placepicker").placepicker();
    });
  </script>
<script>
 $(function () {
   //bootstrap WYSIHTML5 - text editor
   $(".textarea").wysihtml5();
 });
</script>
</body>
</html>

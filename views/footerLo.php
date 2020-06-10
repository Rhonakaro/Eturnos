    <script src="http://localhost/eturnos/public/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/jquery-ui/jquery-ui.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/raphael/raphael.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/morris.js/morris.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <script src="http://localhost/eturnos/public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="http://localhost/eturnos/public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/moment/min/moment.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!--<script src="http://localhost/eturnos/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>-->
    <script src="http://localhost/eturnos/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="http://localhost/eturnos/public/dist/js/adminlte.min.js"></script>
    <script src="http://localhost/eturnos/public/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/eturnos/public/js/select2.min.js"></script>

    
    <script>
        function myFunction() {
          var x = document.getElementById("mypassword");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>


  </body>


</html>

<?php 
  if( isset($_GET['error']) ) {
    $template = '
      <div class="col-3 container text-center p-1 mt-5 bg-primary  text-white">
        <h5 class="item  error">%s</h5>
      </div>
    ';
    printf($template, $_GET['error']);
  }
?>
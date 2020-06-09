     <!-- Footer -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 1.0
        </div>
        <div class="text-center">
          <strong>Copyright &copy; 2020 - eturnos - </strong> All rights reserved.
        </div>
        
      </footer>
   
    
   


    
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
    <script src="http://localhost/eturnos/public/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="http://localhost/eturnos/public/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <script src="http://localhost/eturnos/public/bower_components/fastclick/lib/fastclick.js"></script>
    <script src="http://localhost/eturnos/public/dist/js/adminlte.min.js"></script>
    <script src="http://localhost/eturnos/public/js/jquery.dataTables.min.js"></script>
    <script src="http://localhost/eturnos/public/js/select2.min.js"></script>

    
    <script type="text/javascript">
        $(document).ready(function(){
                $('#search1').select2();
                $('#search2').select2();
                $('#search3').select2();
                $('#search4').select2();
                $('#search5').select2();
                $('#search6').select2();
                $('#search7').select2();
        });
    </script>


    <script>
        $(document).ready( function () {
          $('#datatable').DataTable({
            lengthMenu: [ [8, 10, 12, 14, 16, 20, 24, 32, -1], [8, 10, 12, 14, 16, 20, 24, 32, "All"] ],
          });
            
        } );
    </script>


    <?php if ( $modaljournal ) {  ?>
        <script type="text/javascript"> 
                 
             $('#journalmodal').modal('show');
              
        </script>
    <?php } ?>


    <?php if ( $modalshow ) {  ?>
        <script type="text/javascript"> 
                 
             $('#change_pass').modal('show');
              
        </script>
    <?php } ?>

    
    <?php if ( $showmodal ) {  ?>
        <script type="text/javascript"> 
    
             $('#modal').modal('show');
                 
        </script>
    <?php } ?>


    <?php if ( $showmessage ) {  ?>
        <script type="text/javascript"> 
    
             $('#message').modal('show');
                 
        </script>
    <?php } ?>

    
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>


    <script type="text/javascript">
        function showContent() {
            element = document.getElementById("content");
            check = document.getElementById("doc");
            if (check.checked) {
                element.style.display='block';
            }
            else {
                element.style.display='none';
            }
        }
    </script>


    <script>
        $(".reveal").on('click',function() {
            var $pwd = $(".pwd");
            if ($pwd.attr('type') === 'password') {
                $pwd.attr('type', 'text');
            } else {
                $pwd.attr('type', 'password');
            }
        });
    </script>


  </body>
</html>
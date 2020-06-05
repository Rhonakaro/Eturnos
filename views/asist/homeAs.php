<!-- Central section -->

<div class="content-wrapper">

  <!-- Content Header (Page header) -->
  <div class="row">
    <div class="text-center mb-5">
      <?php  
        $template = '
          <div class="container">
            
              <h2 class="text-primary">Hola %s, bienvenid@</h2>
           
          </div>
        ';
        printf(
          $template,
          $_SESSION['name']
        );
      ?>
      <div class="row">
        <img src="http://localhost/eturnos/public/plugins/assets/img/suport.png">
      </div> 
    </div>
  </div>
</div>
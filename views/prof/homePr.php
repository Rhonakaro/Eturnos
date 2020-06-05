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
      <img src="http://localhost/eturnos/public/plugins/assets/img/nueva.png"> 
    </div>
  </div>
</div>
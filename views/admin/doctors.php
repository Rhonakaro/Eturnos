<?php
print('
<div class="container text-center text-primary mt-5">
  <h3 class="mt-5 mb-5">Listado de Médicos</h3>
</div class="mb-5">
'); 


$doctors_controller = new DoctorsController();
$docs = $doctors_controller->get();

if( empty($docs) ) {
  print( '
    <div>
      <p>No hay Médicos cargados</p>
    </div>
  ');

} else {

        $template_docs = '
          <div class="container col-5">
            <div class="row mt-5">
                <br class="mb-5">
                <table class="table table-hover table-condensed table-bordered table table-sm">
                  <tr>
                    <td class="font-weight-bold text-center text-primary">#</td>
                    <td class="font-weight-bold text-center text-primary">Apellido</td>
                    <td class="font-weight-bold text-center text-primary">Nombre</td>
                    <td class="font-weight-bold text-center text-primary">Especialidad</td>
                    <td class="font-weight-bold text-center text-primary" colspan="2">Actions</td>
                  </tr>
        ';

        for ($n=(0); $n < count($docs); $n++) { 
                  
          $template_docs .= '
            <tbody>
              <tr>
                <td class="text-center">' . $docs[$n]['idoc'] . '</td>
                <td class="text-center">' . $docs[$n]['lname'] . '</td>
                <td class="text-center">' . $docs[$n]['name'] . '</td>
                <td class="text-center">' . $docs[$n]['spec'] . '</td>
                <td class="text-center">
                  <form method="POST">
                    <input type="hidden" name="r" value="doc-edit">
                    <input type="hidden" name="idoc" value="' . $docs[$n]['idoc'] . '">
                    <input class="button edit btn btn-outline-info font-weight-bold btn-sm" type="submit" value="Edit">
                  </form>
                </td>
                <td class="text-center">
                  <form method="POST">
                    <input type="hidden" name="r" value="doc-del">
                    <input type="hidden" name="idoc" value="' . $docs[$n]['idoc'] . '">
                    <input class="button  delete btn btn-outline-danger font-weight-bold btn-sm" type="submit" value="Del">
                  </form>
                </td>
              </tr>
            </tbody>
          '; 
        }

        $template_docs .= '
                </table>
              </div>
            </div>
          </div>
          
        ';
}

print($template_docs);

?>
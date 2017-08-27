<?php
  $ruta ="data-1.json";
  $file = fopen($ruta,"r");
  $leer = fread($file, filesize("data-1.json"));
  $data = json_decode($leer,true);
 
  $response=array();

  //CIUDADES Y TIPO PARA FILTRO
  $ciudades=array();
  $tipos=array();

  $response['tituloContenido'] = '<div class="tituloContenido card">
                    <h5>Resultados de la búsqueda:</h5>
                    <div class="divider"></div>
                    <button type="button" name="todos" class="btn-flat waves-effect" id="mostrarTodos">Mostrar Todos</button>
                    </div>';

  foreach ($data as $key => $value) {
    $ciudades[$key]=$value['Ciudad'];
    $tipos[$key]=$value['Tipo'];

    $response[$key] = '<div class="itemMostrado card">
            <img src="img/home.jpg">
              <div class="card-stacked">
                <span><strong>&nbsp;&nbsp;&nbsp;Direccion :</strong>'.$value['Direccion'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Ciudad : </strong>'.$value['Ciudad'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Telefono : </strong>'.$value['Telefono'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Codigo Postal : </strong>'.$value['Codigo_Postal'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Tipo : </strong>'.$value['Tipo'].'</span><br />
                <span><strong>&nbsp;&nbsp;&nbsp;Precio : </strong><span class="precioTexto">'.$value['Precio'].'</span></span><br /><br />
              <div class="divider"></div>
              <div class="card-action">VER MAS</div>
              </div>
            </div>';
  }

  $ciudades_f=array_unique($ciudades);
  $ciudades_filtradas= array_values($ciudades_f);
  

  $tipos_f= array_unique($tipos);
  $tipos_filtrados= array_values($tipos_f);

 


  $response['ciudades'] =$ciudades_filtradas;
  $response['tipos']=$tipos_filtrados;





  echo json_encode($response);

  fclose($file);
?>

<?php

  $ruta ="data-1.json";
  $file = fopen($ruta,"r");
  $leer=fread($file, filesize("data-1.json"));
  $data=json_decode($leer,true);  
  $response=array();


 
  if($_POST['ciudad'] != "null"){
      $ciudad = $_POST['ciudad'];
  }else{
    $ciudad = null;
  }

  if($_POST['tipo'] != "null"){
      $tipo = $_POST['tipo'];
  }else{
    $tipo = null;
  }
    $p = $_POST['precio'];
    $precio = explode(";",$p);
    $precio_i = intval($precio[0]);
    $precio_f = intval($precio[1]);

  
      if($ciudad != null && $tipo != null){

        // SI EXISTE CIUDAD Y TIPO:
        foreach ($data as $key => $value) {
          $arreglar = array("$",",");
          $valor = str_replace($arreglar,"",$value['Precio']);
          $valor = intval($valor);

          // filtro de precio
          if($precio_i<=$valor && $valor<= $precio_f){
            if($ciudad == $value['Ciudad'] && $tipo == $value['Tipo'] ){
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
          }
        }
      }else if($ciudad !=null xor $tipo !=null){
        // ALGUNO DE LOS DOS EXISTE:
        foreach ($data as $key => $value) {
          $arreglar = array("$",",");
          $valor = str_replace($arreglar,"",$value['Precio']);
          $valor = intval($valor);

          // filtro de precio
          if($precio_i<=$valor && $valor<= $precio_f){
            if($ciudad == null){
              if($tipo == $value['Tipo']){
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
            }else if($tipo == null){
              if($ciudad == $value['Ciudad']){
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
            }
          }
        }
      }else{
        //NINGUNO EXISTE:
        foreach ($data as $key => $value) {
          $arreglar = array("$",",");
          $valor = str_replace($arreglar,"",$value['Precio']);
          $valor = intval($valor);
          // filtro de precio
          if($precio_i<=$valor && $valor<= $precio_f){
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
        }
      }
    //RESPUESTA
    $res=array_unique($response);
    $r= array_values($res);

    echo json_encode($r);
?>

<?php
    require_once "nusoap.php";
    $cliente = new nusoap_client("http://localhost/TareaOnline5/Servidor.php");
    
    
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Servicio Web SOAP</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
    
    <div class="container">
      <form class="form-inline" action="" method="POST">
        <div class="form-group">
          <label for="resta">Operaciones</label>
          <input type="text" name="num1" class="form-control"  placeholder="Introduce primer número" required/>
          <input type="text" name="num2" class="form-control"  placeholder="Introduce segundo número" required/>
        </div>
        <button type="submit" name="submit" class="btn btn-default">Aceptar</button>
      </form>
      <p>&nbsp;</p>
      <h3>
      <?php
        if(isset($_POST['submit']))
        {
          
          $a = $_POST['num1'];
          $b = $_POST['num2'];

         if(is_numeric($a) && is_numeric($b)){

        
          $error = $cliente->getError();
                    if ($error) {
                        echo "<h2>Error en constructor</h2><pre>" . $error . "</pre>";
                    }
                    
                    $resultado = $cliente->call("getResta", array($a, $b));
                    echo "Resultado de la resta entre $a y $b : ".$resultado;
                    echo "<br/>";
                    echo "<br/>";

                    
                    $resultado2 = $cliente->call("getCuadrado", array($a));
                    echo "Resultado del cuadrado de $a : ".$resultado2;
                    echo "<br/>";
                    echo "<br/>";

                    
                    $resultado3 = $cliente->call("getDivision", array($a, $b));
                    echo "Resultado de la división de $a entre $b : ".$resultado3;
                    echo "<br/>";
                    echo "<br/>";

                    if ($cliente->fault) {
                        echo "Error";
                    }
        
       
      }else{
        $error = $cliente->getError();

        if ($error) {
            echo "<h2>Error en constructor</h2><pre>" . $error . "</pre>";
        }
        else{
        echo "Es necesario insertar números";
        }
        if ($cliente->fault) {
          echo "Error";
      }
      }
    }
       ?>
      </h3>
    </div>
    </body>
    </html>
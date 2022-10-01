<!-- /**
*EJERCICIOS POR PHP DEVLOPER 
*AUTOR: SIFAQRS ZERROUKI
*EMAIL: SIPHAXZER@GMAIL.COM
*TEL:658629772
GIT:
 */ -->


<?php 
// Configuracion de base de datos
include_once'includes/config.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Devloper - Sifaqes Zerrouki</title>
    <link rel="apple-touche-icon" href="icon.png">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>


<?php
if($database){
    echo'
    <div>
      <h1>Full Stack PHP</h1>
    </div>
    ';
    }
?>

<div class="container">
    <p>     
    Este trabajo es en  prueba por la empresa Full Stack PHP - Oliplus Servicios - 46469 Beniparrell, Valencia provincia.
    <span>P.D Adjunto mi contacto por cualquier cambio </span>
        <a target="_blank" href="mailto:siphaxzer@gmail.com">siphaxzer@gmail.com</a> 
    </p>
</div>

<main class="container">
<?php

if(isset($_POST['send'])){
$id_parent = $_POST['id_parent'];
$nombre = $_POST['nombre'];

$addData = $database->prepare("INSERT INTO PERSONAS(id_parent,nombre)
 VALUES(:id_parent, :nombre)");

 $addData->bindParam("id_parent",$id_parent);
 $addData->bindParam("nombre",$nombre);

if($addData->execute()){
  echo '<div class="alert alert-success mt-3" role="alert">
        Datos anadidos con exito
        </div>';
 
}else{
  echo '<div class="alert alert-danger" role="alert">
        Erreur anadir datos
        </div>';
  echo '  ';
}
}
?>

<form method="POST">
Id Parent : <input class="form-control" type="number" name="id_parent" required/>
<br>
Nombre : <input class="form-control" type="text" name="nombre" required/>
<br>
<button class="btn btn-danger mt-3" type="submit" name="send">Enviar datos</button>
</form>
</main>


<div class="container">
<?php


$sql =$database->prepare("SELECT * FROM PERSONAS "); 
$sql->execute();


echo'<table class="table">
<tr>
<th>Identificador</th>
<th>Identificador Padre</th>
<th>Identificador Nombre</th>
</tr>

';
foreach($sql AS $result){

echo'

  <tr>
    <th>'.$result["id"] .'</th>
    <td>'.$result["id_parent"] .'</td>
    <td>'.$result["nombre"] .'</td>
  </tr>



';
}
echo'</table>';

  
?>
</div>

<!-- JS BOOTSTRAP -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
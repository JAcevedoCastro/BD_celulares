<?php

include('db.php');

if (isset($_POST['save_task'])) {
  $nombre = $_POST['nombre'];
  $marca = $_POST['marca'];
  $modelo = $_POST['modelo'];
  $color = $_POST['color'];
  $almacenamiento = $_POST['almacenamiento'];
  $memoria= $_POST['memoria'];
  $precio = $_POST['precio'];
  $gama = $_POST['gama'];

  $query = "INSERT INTO productos(nombre, marca, modelo, color, almacenamiento, memoria, precio, gama) VALUES ('$nombre', '$marca', '$modelo', '$color', '$almacenamiento', '$memoria', '$precio', '$gama')";
  $result = mysqli_query($conn, $query);
  if(!$result) {
    die("Fallo.");
  }

  $_SESSION['message'] = 'Guardado correctamente';
  $_SESSION['message_type'] = 'success';
  header('Location: index.php');

}

?>

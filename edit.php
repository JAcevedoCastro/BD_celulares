<?php
include("db.php");
$nombre = '';
$marca= '';
$modelo= '';
$color= '';
$almacenamiento= '';
$memoria= '';
$precio= '';
$gama= '';

if  (isset($_GET['id'])) {
  $id = $_GET['id'];
  $query = "SELECT * FROM productos WHERE id=$id";
  $result = mysqli_query($conn, $query);
  if (mysqli_num_rows($result) == 1) {
  $row = mysqli_fetch_array($result);
  $nombre= $row['nombre'];
  $marca = $row['marca'];
  $modelo= $row['modelo'];
  $color= $row['color'];
  $almacenamiento= $row['almacenamiento'];
  $memoria= $row['memoria'];
  $precio= $row['precio'];
  $gama= $row['gama'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $nombre= $_POST['nombre'];
  $marca = $_POST['marca'];
  $modelo= $_POST['modelo'];
  $color= $_POST['color'];
  $almacenamiento= $_POST['almacenamiento'];
  $memoria= $_POST['memoria'];
  $precio= $_POST['precio'];
  $gama= $_POST['gama'];

  $query = "UPDATE productos set nombre = '$nombre', marca = '$marca',modelo = '$modelo',color = '$color',almacenamiento = '$almacenamiento',memoria = '$memoria',precio = '$precio',gama = '$gama' WHERE id=$id";
  mysqli_query($conn, $query);
  $_SESSION['message'] = 'Editado correctamente';
  $_SESSION['message_type'] = 'warning';
  header('Location: index.php');
}

?>
<?php include('includes/header.php'); ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" value="<?php echo $nombre; ?>" placeholder="Nombre del Telefono">
        </div>
        <div class="form-group">
          <input name="marca" type="text" class="form-control" value="<?php echo $marca ; ?>" placeholder="Marca">
        </div>
        <div class="form-group">
          <input name="modelo" type="text" class="form-control" value="<?php echo $modelo; ?>" placeholder="Modelo">
        </div>
        <div class="form-group">
          <input name="color" type="text" class="form-control" value="<?php echo $color; ?>" placeholder="Color">
        </div>
        <div class="form-group">
          <input name="almacenamiento" type="text" class="form-control" value="<?php echo $almacenamiento; ?>" placeholder="Almacenamiento">
        </div>
        <div class="form-group">
          <input name="memoria" type="text" class="form-control" value="<?php echo $memoria; ?>" placeholder="Memoria">
        </div>
        <div class="form-group">
          <input name="precio" type="text" class="form-control" value="<?php echo $precio; ?>" placeholder="Precio">
        </div>
        <div class="form-group">
          <input name="gama" type="text" class="form-control" value="<?php echo $gama; ?>" placeholder="Gama">
        </div>
        
        <button class="btn-success" name="update">
          Actualizar
</button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include('includes/footer.php'); ?>

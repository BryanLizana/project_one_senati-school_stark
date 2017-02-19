<?php require_once(ROOT.'/models/bloques.php') ?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( is_numeric($_POST['id_bloque']) && $_POST['id_bloque'] !== '0') {
        $bloque =  new Bloques();
        $bloque->id_bloque = $_POST['id_bloque'];
        $bloque->delete_bloque();
        header('location:/'.strtolower($_SESSION['user']['type_us']).'/bloques/');
    }
}
 ?>
<div class="main">
    <h2>Desea eliminar El bloque  de ID: <?php echo $_GET['id'] ?> ?</h2>
    <form action="" method="POST">
        <a href="<?php  echo '/'.strtolower($_SESSION['user']['type_us']).'/bloques/' ?>"> <button type="button">Cancelar</button> </a> 
        <input type="hidden" name="id_bloque" value="<?php echo $_GET['id'] ?>">
        <input type="submit" name="" value="Eliminar">
    </form>
</div>
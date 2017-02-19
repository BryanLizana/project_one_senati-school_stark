<?php require_once(ROOT.'/models/users.php') ?>
<?php require_once(ROOT.'/models/bloque_alumnos.php') ?>
<?php require_once(ROOT.'/models/bloques.php') ?>



<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( is_numeric($_POST['id_user']) && $_POST['id_user'] !== '0') {
        $user =  new Users();
        $user->id_user = $_POST['id_user'];
        $user->delete_user();

        //quitar vacancia del bloque donde se encontraba
        $bloque_alumnos =  new BloqueAlumnos();
        $bloque_alumnos->id_user_alumno = $_POST['id_user'];
        $id_bloque = $bloque_alumnos->get_bloque();
        $bloques =  new Bloques();
        $bloques->id_bloque = $id_bloque['id_bloque'];
        $bloques->delete_vacante();


        header('location:/'.strtolower($_SESSION['user']['type_us']).'/alumnos/');
    }
}
 ?>
<div class="main">
    <h2>Desea eliminar El Alumno de ID: <?php echo $_GET['id'] ?> ?</h2>
    <form action="" method="POST">
        <a href="<?php  echo '/'.strtolower($_SESSION['user']['type_us']).'/alumnos/' ?>"> <button type="button">Cancelar</button> </a> 
        <input type="hidden" name="id_user" value="<?php echo $_GET['id'] ?>">
        <input type="submit" name="" value="Eliminar">
    </form>
</div>
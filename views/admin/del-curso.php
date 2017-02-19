<?php require_once(ROOT.'/models/cursos.php') ?>

<?php 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( is_numeric($_POST['id_curso']) && $_POST['id_curso'] !== '0') {
        $curso =  new Cursos();
        $curso->id_curso = $_POST['id_curso'];
        $curso->delete_curso();
        header('location:/'.strtolower($_SESSION['user']['type_us']).'/cursos/');
    }
}
 ?>
<div class="main">
    <h2>Desea eliminar El Curso  de ID: <?php echo $_GET['id'] ?> ?</h2>
    <form action="" method="POST">
        <a href="<?php  echo '/'.strtolower($_SESSION['user']['type_us']).'/cursos/' ?>"> <button type="button">Cancelar</button> </a> 
        <input type="hidden" name="id_curso" value="<?php echo $_GET['id'] ?>">
        <input type="submit" name="" value="Eliminar">
    </form>
</div>
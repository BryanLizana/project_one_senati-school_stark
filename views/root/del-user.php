<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ( is_numeric($_POST['id_user']) && $_POST['id_user'] !== '0') {
        $user =  new Users();
        $user->id_user = $_POST['id_user'];
        $user->delete_user();
        header('location:/root/detail/');
    }
}
 ?>
<div class="main">
    <h2>Desea eliminar al usuario de ID: <?php echo $_GET['id'] ?> ?</h2>
    <form action="" method="POST">
        <a href="<?php  echo '/root/detail/' ?>"> <button type="button">Cancelar</button> </a> 
        <input type="hidden" name="id_user" value="<?php echo $_GET['id'] ?>">
        <input type="submit" name="" value="Eliminar">
    </form>
</div>
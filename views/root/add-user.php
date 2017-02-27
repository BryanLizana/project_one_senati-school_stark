<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $user = new Users();
        //add params
        $user->id_user =  $_POST['id_user'];        
        $user->name =  $_POST['name'];
        $user->last_name =  $_POST['last_name'];
        $user->code =  $_POST['code'];
        // $user->status =  $_POST['status'];
        $user->email =  $_POST['email'];
        $user->phone =  $_POST['phone'];
        $user->password =  $_POST['password'];
        $user->type_us =  $_POST['type_us'];


        ///añadir nuevo usuario al sistema
         $r = $user->save_user();     
        if (!empty($r)) {
            if (is_numeric($r)) {
              $user->id_user =  $r ;        
              $data =  $user->list_user();
              $data = $data[0];
               $info = "Usuario Ingresado";
            }else {
               $info = $r;
               $data = $_POST;
            }
        }else {
            $info = "No hay cambios";                       
            $data = $_POST;
            
        }
}
 ?>
<div class="main">
    <h2>Agregar Usuario</h2>
    <label for="error"><?php  echo $info = ( isset($info) && !empty($info) ) ? $info : "" ?></label><br>
    <form class="pure-form pure-form-aligned" action="" method="POST">
    <?php  include_once('../templates/form/user-form.php'); ?>
    <input type="submit" name="" value="Save">
    </form>
</div>
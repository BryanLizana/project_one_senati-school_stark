<?php 
$user =  new Users();
$data = $user->list_user();

 ?>
<div class="main">
    <h2>Listar Usuarios</h2>
    <label for="error"><?php  echo $error = ( isset($error) && !empty($error) ) ? $error : "" ?></label><br>
    <table class="pure-table">
    <thead>
        <tr>
            <th></th>     
            <th></th>                               
            <th>ID</th>
            <th>CODE|DNI</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Teléfono</th> 
            <th>Tipo</th>                       
            <th>STATUS</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $user): ?>
        
        <tr class="pure-table-odd">
            <td><a href="<?php echo '/root/edit-user/'.$user['id_user'].'/' ?>">Edit</a></td>            
            <td><a href="<?php echo '/root/del-user/'.$user['id_user'].'/' ?>">Delete</a></td>            
            <td><?php echo $user['id_user'] ?></td>
            <td><?php echo $user['code'] ?></td>            
            <td><?php echo $user['name'] ?></td>
            <td><?php echo $user['last_name'] ?></td>
            <td><?php echo $user['email'] ?></td>
            <td><?php echo $user['phone'] ?></td>
            <td><?php echo $user['type_us'] ?></td>
            <td><?php echo $user['status'] ?></td>              
        </tr>
    <?php endforeach ?>
        </tbody>
    </table>
</div>



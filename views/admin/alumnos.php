<?php require_once(ROOT.'/models/bloque_alumnos.php') ?>
<?php require_once(ROOT.'/models/bloques.php') ?>
<?php require_once(ROOT.'/models/users.php') ?>
<?php require_once(ROOT.'/models/alumnos.php') ?>


 <?php error_reporting(0); ?>
 <?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST' && is_numeric($_POST['id_bloque']) && $_POST['id_bloque'] != '0' ) {

        $user = new Users();
        $user->id_user =  $_POST['id_user'];        
        $user->name =  $_POST['name'];
        $user->last_name =  $_POST['last_name'];
        $user->code =  $_POST['code'];
        $user->email =  $_POST['email'];
        $user->phone =  $_POST['phone'];
        if ($_POST['password'] == '') {
             $user->password =  $_POST['code'];
        }else {
             $user->password =  $_POST['password'];            
        }
        $user->type_us = 'ALUMNO';
        $r = $user->save_user();
            if (!empty($r)) {
            if (is_numeric($r) && $r != '0') {
              $user->id_user =  $r ;        
              $data =  $user->list_user();
              $data = $data[0];
              //ingresar datos adicionales del alumno
              $bloque_alumnos = new BloqueAlumnos();
              $bloque_alumnos->id_user_alumno = $r;
              $bloque_alumnos->id_bloque = $_POST['id_bloque'];
              $r = $bloque_alumnos->save_bloque_alumnos(); 
              if (is_numeric($r)  && $r != '0') {
                  $info = "alumno Ingresado";                    

                    $alumno =  new Alumnos();
                    $alumno->id_user = $r;
                    $data = $alumno->list_alumno();
                    $data = $data[0]; 
              }else {
                   $info = $r;
              }
            }else {
               $info = $r;
            //    $data = $_POST;
            }
        }else {
            $info = "No hay cambios";                       
            $data = $_POST;
            
    }

    
 }else {
    if (is_numeric($_GET['id']) && $_GET['id'] !== '0') {    
    $alumno =  new Alumnos();
    $alumno->id_user = $_GET['id'];
    $data = $alumno->list_alumno();
    $data = $data[0]; 

    }
}

//list bloque
$bloque =  new Bloques();
$bloques = $bloque->list_bloque_vacantes();
  ?>

<div class="main">
    <?php $string = (!isset($data['id_alumno'])) ? 'Agregar': 'Editar' ?>
    <h3> <?php echo $string ?> alumno</h3>
    <label for="error"><?php  echo $info = ( isset($info) && !empty($info) ) ? $info : "" ?></label><br>
    <form method="POST"  class="pure-form pure-form-aligned" >
        <div class="pure-control-group">
            <label for="id">Usuario ID </label>
            <input id="id" name="id_user_text" name="id_user"  type="text" disabled placeholder="ID" value="<?php echo($data['id_user']) ?>" >
            <input type="hidden" name="id_user" value="<?php echo($data['id_user']) ?>">
        </div>
        <div class="pure-control-group">
            <label for="dni">DNI</label>
            <input id="dni" name="code"  type="number" placeholder="DNI" value="<?php echo($data['code']) ?>" >
            
        </div>        
        <div class="pure-control-group">
            <label for="name">Nombres</label>
            <input id="name" name="name"  type="text" placeholder="Nombre" value="<?php echo($data['name']) ?>" >
            
        </div>
        <div class="pure-control-group">
            <label for="lastname">Apellidos</label>
            <input id="lastname" name="last_name"  type="text" placeholder="Apellidos" value="<?php echo($data['last_name']) ?>" >
            
        </div>
        <div class="pure-control-group">
            <label for="email">Email Address</label>
            <input id="email" name="email"  type="email" placeholder="Email" value="<?php echo($data['email']) ?>" >
        </div>

        <div class="pure-control-group">
            <label for="phone">Phone</label>
            <input id="phone" name="phone"  type="number" placeholder="Phone" value="<?php echo($data['phone']) ?>" >
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input id="password" name="password"  type="password" placeholder="Password" value="<?php echo($data['password']) ?>" >
        </div>
        <div class="pure-control-group">
            <label for="password">Seleccionar bloque</label>
               <select id="state" class="pure-input-1-5" name="id_bloque">
                <?php foreach ($bloques as $blo): ?>
                    <?php $selected = ($data['id_bloque'] == $blo['id_bloque']) ? 'selected':''  ?>
                    <option value="<?php echo $blo['id_bloque'] ?>"  <?php echo $selected ?> ><?php echo $blo['code'] ?></option>
                <?php endforeach ?>
                    
                </select>
         </div>

        <a href="<?php  echo '/'.strtolower($_SESSION['user']['type_us']).'/alumnos/' ?>"> <button type="button">Cancelar</button> </a> 
        <input type="submit" name="" value="Save">

    </form>

    <hr>
    <h3>Listado de alumnos</h3>

    <?php 
    unset($user);
    unset($data);
    unset($alumno);
    
    $alumno =  new Alumnos();
    $data = $alumno->list_alumno();
    
     ?>
     <table class="pure-table">
    <thead>
        <tr>
            <th></th>     
            <th></th>                               
            <th>ID</th>
            <th>CODE</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Email</th>
            <th>Telefono</th>  
            <th>Bloque</th>                                                  
            <th>STATUS</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $alumno): ?>
        
        <tr class="pure-table-odd">
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/alumnos/'.$alumno['id_user'].'/' ?>">Edit</a></td>            
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/del-alumno/'.$alumno['id_user'].'/' ?>">Delete</a></td>            
            <td><?php echo $alumno['id_user'] ?></td>
            <td><?php echo $alumno['code'] ?></td>            
            <td><?php echo $alumno['name'] ?></td>
            <td><?php echo $alumno['last_name'] ?></td>
            <td><?php echo $alumno['email'] ?></td>
            <td><?php echo $alumno['phone'] ?></td>
            <td><?php echo $alumno['bloque'] ?></td>    
            <td><?php echo $alumno['status'] ?></td>              
                      
        </tr>
    <?php endforeach ?>
        </tbody>
    </table>

</div>
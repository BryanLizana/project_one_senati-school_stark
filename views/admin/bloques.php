<?php require_once(ROOT.'/models/bloques.php') ?>
 <?php error_reporting(0); ?>
 <?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bloque = new Bloques();
    $bloque->id_bloque =$_POST['id_bloque'];
    $bloque->seccion =$_POST['seccion'];
    $bloque->code =$_POST['code'];
    $bloque->grado =$_POST['grado'];
    $bloque->num_max_vacante =$_POST['num_max_vacante'];
    $r = $bloque->save_bloque();
            if (!empty($r)) {
            if (is_numeric($r)) {
              $bloque->id_bloque =  $r ;        
              $data =  $bloque->list_bloque();
              $data = $data[0];
               $info = "Bloque Ingresado";
            }else {
               $info = $r;
               $data = $_POST;
            }
        }else {
            $info = "No hay cambios";                       
            $data = $_POST;
            
    }

    
 }else {
    if (is_numeric($_GET['id']) && $_GET['id'] !== '0') {
    $bloque = new Bloques();
    $bloque->id_bloque =  $_GET['id'];  
    $data =  $bloque->list_bloque();
    $data = $data[0];
    }

}
 
  ?>

<div class="main">
    <?php $string = (!isset($data['id_bloque'])) ? 'Agregar': 'Editar' ?>
    <h3> <?php echo $string ?> bloque</h3>
    <label for="error"><?php  echo $info = ( isset($info) && !empty($info) ) ? $info : "" ?></label><br>
    <form method="POST"  class="pure-form pure-form-aligned" >
        <div class="pure-control-group">
            <label for="id">Bloque ID </label>
            <input id="id" name="id_bloque"  type="text" disabled placeholder="ID" value="<?php echo($data['id_bloque']) ?>" >
            <input type="hidden" name="id_bloque" value="<?php echo($data['id_bloque']) ?>">
        </div>
        <div class="pure-control-group">
            <label for="dni">Code(SeccionGrado)</label>
            <input id="dni" name="code"  type="text" placeholder="Code" value="<?php echo($data['code']) ?>" >
            
        </div>        
        <div class="pure-control-group">
            <label for="name">Sección</label>
            <input id="name" name="seccion"  type="text" placeholder="Seccion" value="<?php echo($data['seccion']) ?>" >
            
        </div>
        <div class="pure-control-group">
            <label for="lastname">Grado</label>
            <input id="lastname" name="grado"  type="text" placeholder="Grado" value="<?php echo($data['grado']) ?>" >
            
        </div>
        <div class="pure-control-group">
            <label for="lastname">Max de vacantes</label>
            <input id="lastname" name="num_max_vacante"  type="text" placeholder="Vacantes"  value="<?php echo($data['num_max_vacante']) ?>" >
            
        </div>
        <div class="pure-control-group">
            <label for="lastname">Alumnos Actuales</label>
            <input id="lastname" name="num_actual_alu"  type="text" placeholder="Alumnos Actuales" disabled value="<?php echo($data['num_actual_alu']) ?>" >
            
        </div>

        <a href="<?php  echo '/'.strtolower($_SESSION['user']['type_us']).'/bloques/' ?>"> <button type="button">Cancelar</button> </a> 
        <input type="submit" name="" value="Save">

    </form>

    <hr>
    <h3>Listado de bloques</h3>

    <?php 
    unset($bloque);
    unset($data);
    $bloque =  new Bloques();
    $data = $bloque->list_bloque();
    
     ?>
     <table class="pure-table">
    <thead>
        <tr>
            <th></th>     
            <th></th>                               
            <th>ID</th>
            <th>CODE</th>
            <th>Seccion</th>
            <th>Grado</th>
            <th>Vacantes</th>
            <th>Alumnos</th>                    
            <th>STATUS</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $bloque): ?>
        
        <tr class="pure-table-odd">
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/bloques/'.$bloque['id_bloque'].'/' ?>">Edit</a></td>            
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/del-bloque/'.$bloque['id_bloque'].'/' ?>">Delete</a></td>            
            <td><?php echo $bloque['id_bloque'] ?></td>
            <td><?php echo $bloque['code'] ?></td>            
            <td><?php echo $bloque['seccion'] ?></td>
            <td><?php echo $bloque['grado'] ?></td>
            <td><?php echo $bloque['num_max_vacante'] ?></td>
            <td><?php echo $bloque['num_actual_alu'] ?></td>
            <td><?php echo $bloque['status'] ?></td>              
        </tr>
    <?php endforeach ?>
        </tbody>
    </table>

</div>
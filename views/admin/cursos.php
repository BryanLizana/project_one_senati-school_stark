<?php require_once(ROOT.'/models/cursos.php') ?>
 <?php error_reporting(0); ?>
 <?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $curso = new cursos();
    $curso->id_curso =$_POST['id_curso'];
    $curso->name =$_POST['name'];
    $curso->description =$_POST['description'];
    $r = $curso->save_curso();
            if (!empty($r)) {
            if (is_numeric($r)) {
              $curso->id_curso =  $r ;        
              $data =  $curso->list_curso();
              $data = $data[0];
               $info = "Curso Ingresado";
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
    $curso = new Cursos();
    $curso->id_curso =  $_GET['id'];  
    $data =  $curso->list_curso();
    $data = $data[0];
    }

}
 
  ?>

<div class="main">
    <?php $string = (!isset($data['id_curso'])) ? 'Agregar': 'Editar' ?>
    <h3> <?php echo $string ?> curso</h3>
    <label for="error"><?php  echo $info = ( isset($info) && !empty($info) ) ? $info : "" ?></label><br>
    <form method="POST"  class="pure-form pure-form-aligned" >
        <div class="pure-control-group">
            <label for="id">curso ID </label>
            <input id="id" name="id_curso"  type="text" disabled placeholder="ID" value="<?php echo($data['id_curso']) ?>" >
            <input type="hidden" name="id_curso" value="<?php echo($data['id_curso']) ?>">
        </div>
        <div class="pure-control-group">
            <label for="dni">Nombre del Curso</label>
            <input id="dni" name="name"  type="text" placeholder="Curso" value="<?php echo($data['name']) ?>" >
            
        </div>        
        <div class="pure-control-group">
            <label for="name">Description</label>
            <input id="name" name="description"  type="text" placeholder="description" value="<?php echo($data['description']) ?>" >
            
        </div>
        <a href="<?php  echo '/'.strtolower($_SESSION['user']['type_us']).'/cursos/' ?>"> <button type="button">Cancelar</button> </a> 
        <input type="submit" name="" value="Save">

    </form>

    <hr>
    <h3>Listado de cursos</h3>

    <?php 
    unset($curso);
    unset($data);
    $curso =  new Cursos();
    $data = $curso->list_curso();
    
     ?>
     <table class="pure-table">
    <thead>
        <tr>
            <th></th>     
            <th></th>                               
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $curso): ?>
        
        <tr class="pure-table-odd">
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/cursos/'.$curso['id_curso'].'/' ?>">Edit</a></td>            
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/del-curso/'.$curso['id_curso'].'/' ?>">Delete</a></td>            
            <td><?php echo $curso['id_curso'] ?></td>
            <td><?php echo $curso['name'] ?></td>            
            <td><?php echo $curso['description'] ?></td>            
        </tr>
    <?php endforeach ?>
        </tbody>
    </table>

</div>
<?php require_once(ROOT.'/models/bloque_curso_docente.php') ?>
<?php require_once(ROOT.'/models/bloques.php') ?>
<?php require_once(ROOT.'/models/cursos.php') ?>
<?php require_once(ROOT.'/models/docentes.php') ?>


 <?php error_reporting(0); ?>
 <?php 
 if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {

        $user = new Users();
        $user->id_user =  $_POST['id_user'];        
        $user->name =  $_POST['name'];
        $user->last_name =  $_POST['last_name'];
        $user->code =  $_POST['code'];
        $user->email =  $_POST['email'];
        $user->phone =  $_POST['phone'];
        $user->password =  $_POST['code'];
        $user->type_us = 'DOCENTE';
        $r = $user->save_user();
            if (!empty($r)) {
                if (is_numeric($r) && $r != '0') {
                // $user->id_user =  $r ;        
                // $data =  $user->list_user();
                // $data = $data[0];
                //ingresar datos de cursos y bloques
                    if (is_array($_POST['bloques'])  && is_array($_POST['cursos']) ) {
                      $bloque_curso_docente =  new BloqueCursoDocente();
                      $bloque_curso_docente->id_user_docente = $r; //añadir el id del docente
                      $bloque_curso_docente->delete_docente_detalle();

                       foreach ($_POST['bloques'] as $id_bloque) {
                          $bloque_curso_docente->id_bloque = $id_bloque;   // añadir id del bloque                        
                          foreach ($_POST['cursos'] as $id_curso) {
                              $bloque_curso_docente->id_curso = $id_curso; // añadir id del curso
                              $bloque_curso_docente->save_bloque_curso_docente(); // agregar info detalle del docente
                          }
                       }
                    }
                    $info = "Docente Ingresado";  
                    $docente =  new Docentes();
                    $docente->id_user = $r;
                    $data = $docente->list_docente();
                    $data = $data[0]; 
                    
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
    // $user = new Users();
    // $user->id_user =  $_GET['id'];  
    // $data =  $user->list_user();
    // $data = $data[0];        
    $docente =  new Docentes();
    $docente->id_user = $_GET['id'];
    $data = $docente->list_docente();
    $data = $data[0]; 

    }

}
$cursos = new Cursos();
$data_cursos  = $cursos->list_curso();


//list bloque curso docente
$bloques = new Bloques();
$data_bloques  = $bloques->list_bloque();
  ?>

<div class="main">
    <?php $string = (!isset($data['id_alumno'])) ? 'Agregar': 'Editar' ?>
    <h3> <?php echo $string ?> Docente</h3>
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
        <!--Cursos Asignados-->
         <div class="pure-control-group">
              <div class="pure-control-group">
                     <label for="password">Cursos Asignados</label>
              </div>

              <?php foreach ($data_cursos as $curso): ?>
                <?php $checked = (in_array($curso['id_curso'],$data['array_cursos'])) ? 'checked': '' ?>              
                <label for="<?php echo $curso['name'] ?>" class="pure-checkbox">
                    <input id="<?php echo $curso['name'] ?>" type="checkbox" value="<?php echo $curso['id_curso'] ?>" <?php echo $checked ?> name="cursos[]">
                    <?php echo $curso['name'] ?>
                </label>
              <?php endforeach ?>
                
       
         </div>

        <!--Bloques Asignados-->
         <div class="pure-control-group">
              <div class="pure-control-group">
                     <label for="password">Bloques Asignados</label>
              </div>

              <?php foreach ($data_bloques as $bloque): ?>
                <label for="<?php echo $bloque['code'] ?>" class="pure-checkbox">
                    <?php $checked = (in_array($bloque['id_bloque'],$data['array_bloques'])) ? 'checked': '' ?>
                    <input id="<?php echo $bloque['code'] ?>" type="checkbox" value="<?php echo $bloque['id_bloque'] ?>" <?php echo $checked ?>  name="bloques[]">
                    <?php echo $bloque['code'] ?>
                </label>
              <?php endforeach ?>
                
       
         </div>

        <a href="<?php  echo '/'.strtolower($_SESSION['user']['type_us']).'/docentes/' ?>"> <button type="button">Cancelar</button> </a> 
        <input type="submit" name="" value="Save">

    </form>

    <hr>
    <h3>Listado de Docentes</h3>

    <?php 
    unset($user);
    unset($data);
    unset($docentes);
    
    $docentes =  new Docentes();
    $data = $docentes->list_docente();
    
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
            <th>STATUS</th>
        </tr>
    </thead>

    <tbody>
    <?php foreach ($data as $docente): ?>
        
        <tr class="pure-table-odd">
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/docentes/'.$docente['id_user'].'/' ?>">Edit</a></td>            
            <td><a href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/del-docente/'.$docente['id_user'].'/' ?>">Delete</a></td>            
            <td><?php echo $docente['id_user'] ?></td>
            <td><?php echo $docente['code'] ?></td>            
            <td><?php echo $docente['name'] ?></td>
            <td><?php echo $docente['last_name'] ?></td>
            <td><?php echo $docente['email'] ?></td>
            <td><?php echo $docente['phone'] ?></td>
            <td><?php echo $docente['status'] ?></td>             
                      
        </tr>
    <?php endforeach ?>
        </tbody>
    </table>

</div>
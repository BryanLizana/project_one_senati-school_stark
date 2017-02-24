<!--validar si este docente puede editar notas-->
<?php require_once('../../models/alumno_control.php'); ?>
<?php require_once('../../models/alumno_notas.php'); ?>

<?php 
$temporada_clase  =  json_decode( file_get_contents('temporada_clase.json'), 1);
// echo '<pre>'; var_dump( $temporada_clase ); echo '</pre>';  /***VAR_DUMP_DIE***/ 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   $alumno_notas = new AlumnoNotas();
   $alumno_notas->id_alumno_control = $_GET['id'];
   $alumno_notas->temporada_clase = $temporada_clase['number_temporada'];

   //limpiar notas anteriores y ya está listo para actualizarlo
   $alumno_notas->delete_nota();
    for ($i=1; $i < 5; $i++) { 
        $alumno_notas->n_nota ='nota_'.$i;
        $alumno_notas->nota = $_POST['nota_'.$i];
       $r = $alumno_notas->save_nota();
    }
}

//Traer datos de control del alumno (id => id que tiene cada alumno según el docente y curso actual)
$alumno_control =  new AlumnoControl();
$alumno_control->id_alumno_control = $_GET['id'];
$data_alumno_control = $alumno_control->list_alumno_control();
//validate permisos 
if ($data_alumno_control['id_user_docente'] != $_SESSION['user']['ID']   ) {
  die('Access denied');
}

//traer notas si se ha registrado con anterioridad
$alumno_notas = new AlumnoNotas();
$alumno_notas->id_alumno_control = $_GET['id'];
$alumno_notas->temporada_clase = $temporada_clase['number_temporada'];
$r_notas = $alumno_notas->list_nota_by_temporada();
$data = $r_notas;  //4 notas en un array ?>

<div class="main">   
    <h3><?php echo $temporada_clase['temporada'] ?> :<?php echo $temporada_clase['temporada_name'] ?></h3>
    <h4>Notas del alumno : <?php echo $data_alumno_control['name'] . ' , ' . $data_alumno_control['last_name']   ?></h4>
    <form action="" class="pure-form pure-form-aligned" method="POST">
         <div class="pure-control-group">
            <label for="no1">Nota 1 </label>
            <input id="no1" name="nota_1"   type="number"  placeholder="Primera nota" value="<?php echo($data['nota_1']) ?>" >
        </div>
        <div class="pure-control-group">
            <label for="no2">Nota 2 </label>
            <input id="no2" name="nota_2" type="number"  placeholder="Segunda nota" value="<?php echo($data['nota_2']) ?>" >
        </div>
        <div class="pure-control-group">
            <label for="no3">Nota 3 </label>
            <input id="no3" name="nota_3"  type="number"  placeholder="Tercera nota" value="<?php echo($data['nota_3']) ?>" >
        </div>
        <div class="pure-control-group">
            <label for="no4">Nota 4</label>
            <input id="no4" name="nota_4"  type="number"  placeholder="Cuearta nota" value="<?php echo($data['nota_4']) ?>" >
        </div>
        <a href="<?php  echo '/'.strtolower($_SESSION['user']['type_us']).'/alumno/'.$_GET['id'].'/' ?>"> <button type="button">Cancelar</button> </a> 
        
        <input type="submit" name="" value="Save">
    </form>
    <br>
      <!--<a href="<?php  echo '/'.strtolower($_SESSION['user']['type_us']).'/cursos//' ?>"> <button type="button">Atrás</button> </a> -->
    

</div>


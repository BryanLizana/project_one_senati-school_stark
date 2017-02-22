<?php require_once('../../models/alumno_control.php'); 

if (isset($_POST['generate'])) {
    # code...
    
$classs = new AlumnoControl();
$r = $classs->generate();
echo '<pre>'; var_dump( $r ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
}
?> 


<div class="main">
    <h2>Generar Control para los alumnos?</h2>
    <form action="" method="POST">
        <input type="submit" name="generate" value="Generar">
    </form>
</div>
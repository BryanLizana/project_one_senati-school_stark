<?php 
require_once('/conexion.php');


/**
 * 
 */
class AlumnoControl 
{
    
    function __construct()
    {
        # code...
    }
    public function generate()
    {
       global $db_class;
       $sql_select_alus = "SELECT id_user_alumno,id_bloque FROM bloque_alumnos where id_user_alumno  NOT in (select id_user_alumno FROM alumno_control) ";
       $select_insert = $db_class->query($sql_select_alus);
       //alumnos que aun no estan en la tabla de alumno_control       
       foreach ($select_insert as $insert) {
            //recoger su bloque
            $id_bloque =  $insert['id_bloque'];
            $id_alumno=  $insert['id_user_alumno'];
            
            //recoger cursos de ese bloque y los docentes que los imponen 
            $data = array(':id_bloque' => $id_bloque );
            $sql_for_insert = "SELECT * FROM bloque_curso_docente where id_bloque =:id_bloque";
            $list_for_insert = $db_class->query($sql_for_insert,$data);
            foreach ($list_for_insert as $value) {
                $data = array(':id_bloque' =>   $id_bloque ,
                                ':id_curso' => $value['id_curso'],
                                ':id_user_alumno' => $id_alumno,
                                ':id_user_docente' => $value['id_user_docente']
                                );
                //Crear control de alumnos
                $sql = "INSERT INTO alumno_control(id_bloque,id_curso,id_user_alumno,id_user_docente,status)
                         VALUES(:id_bloque,:id_curso,:id_user_alumno,:id_user_docente,'ACTIVO')";
                $db_class->query($sql,$data);
            }
            //ingresarlos en la tabla

       }

       return 'Listo';
    }
}

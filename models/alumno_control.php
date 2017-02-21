<?php 
require_once('/conexion.php');


/**
 * 
 */
class AlumnoControl 
{

    public $id_user_alumno;
    public $id_user_docente;
    public $id_curso;
    public $id_bloque;
    public $status;
    
    
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

    //listar a los alumnos de un bloque con un curso asignado => para la toma de asistencia  o adición de notas
    public function list_alumno_by_curso()
    {
        global $db_class;
        if (self::validate($this->id_curso) && self::validate($this->id_bloque)  && self::validate($this->id_user_docente) ) {
           
            $data = array(':id_bloque' => $this->id_bloque ,':id_curso' => $this->id_curso ,':id_user_docente' => $this->id_user_docente );
           $sql = "SELECT * FROM alumno_control as ac inner join users as u on ac.id_user_alumno = u.id_user where id_bloque = :id_bloque and id_curso = :id_curso and id_user_docente = :id_user_docente and u.status = 'ACTIVO' ";
           $r = $db_class->query($sql,$data);
           return $r;

        }
       
    }

    //validar si es un id válido
    private function validate($numeric)
    {
        if (is_numeric($numeric)  && $numeric > 0 ) {
            return true;
        }else {
            return false;
        }
    }
}

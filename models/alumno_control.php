<?php 
require_once(ROOT.'/models/conexion.php');


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
    
    public $id_alumno_control;    
    
    
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


    public function list_alumno_control()
    {
        global $db_class;
        if (is_numeric($this->id_alumno_control)  && $this->id_alumno_control != '0') {
            $data = array(':id_alumno_control' => $this->id_alumno_control );
            $sql = "SELECT * FROM alumno_control as ac inner join users as u on u.id_user = ac.id_user_alumno where id_alumno_control = :id_alumno_control";
            $r =  $db_class->query($sql,$data,'ROW');
            return $r ;
        }else {
            return null;
        }
    }

    public function list_data_alumno_control()
    {
         global $db_class;
        if (is_numeric($this->id_user_alumno)  && $this->id_user_alumno != '0') {
            $data = array(':id_user_alumno' => $this->id_user_alumno );
            $sql = "SELECT c.description ,c.id_curso , b.code as 'bcode' ,b.id_bloque, ac.id_alumno_control, u.name, u.last_name ,u.code, u.id_user, u.email, u.phone,u.type_us, ud.last_name  as 'last_name_docente' ,ud.id_user as 'id_user_docente' FROM alumno_control as ac inner join users as u on u.id_user = ac.id_user_alumno
                    inner join cursos as c on c.id_curso = ac.id_curso  
                    inner join users as ud on ud.id_user = ac.id_user_docente
                    inner join bloques as b on b.id_bloque = ac.id_bloque                      
                         where  id_user_alumno = :id_user_alumno";
            $r =  $db_class->query($sql,$data);
            return $r ;
        }else {
            return null;
        }
    }
}

<?php 
require_once(ROOT.'/models/conexion.php');
require_once(ROOT.'/models/users.php');

/**
 * 
 */
class Docentes extends Users
{
    
    function __construct()
    {
       
    }

    public function list_docente()
    {   
        global $db_class;
        $this->type_us = "DOCENTE";
        $r_users = self::list_user();
        $i = 0;
        $r = null;
        foreach ($r_users as  $r_user) {

           if ($r_users[$i]['status'] == 'ACTIVO') {
              $r[] = $r_users[$i];
           }
           $i++;
        }

        //add info to data list_docente
        if (is_numeric($this->id_user) && $this->id_user != '0') {
            $data  = array(':id_user_docente' =>  $this->id_user  );
            $sql = "SELECT id_bloque,id_curso FROM bloque_curso_docente where id_user_docente =:id_user_docente" ;
            $r_select = $db_class->query($sql,$data);
            if (is_array($r_select)) {
                foreach ($r_select as  $value) {
                    $array_cursos[] = $value['id_curso'];
                    $array_bloques[] = $value['id_bloque'];
                    
                }
              $array_cursos =  array_unique($array_cursos);
              $array_bloques =  array_unique($array_bloques);
              $r[0]['array_cursos'] = $array_cursos;
              $r[0]['array_bloques'] = $array_bloques;
              
            }
        }


        return $r;
    }

    
    
}


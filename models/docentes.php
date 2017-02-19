<?php 
require_once('/conexion.php');
require_once('/users.php');


/**
 * 
 */
class Docentes extends Users
{
    
    function __construct()
    {
       
    }

    public function list_docentes()
    {   
        global $db_class;
        $this->type_us = "DOCENTE";
        $r_users = self::list_user();
        $i = 0;
        $r = null;
        foreach ($r_users as  $r_user) {


        //     $data = array(':id_user' => $r_user['id_user'] );
        //     $sql = "select * from bloque_cursos_docente where id_user_docente = :id_user";

        //     $list = $db_class->query($sql,$data);


        //     if ($bloque == false) {
        //        $bloque['code'] = '';
        //        $bloque['id_bloque'] = '';
               
        //     }
        //    $r_users[$i]['bloque'] = $bloque['code'];
        //    $r_users[$i]['id_bloque'] = $bloque['id_bloque'];

           if ($r_users[$i]['status'] == 'ACTIVO') {
              $r[] = $r_users[$i];
           }
           $i++;
        }

        return $r;
    }

    
    
}


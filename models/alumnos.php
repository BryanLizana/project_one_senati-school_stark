<?php 
require_once('/conexion.php');
require_once('/users.php');


/**
 * 
 */
class Alumnos extends Users
{
    
    function __construct()
    {
       
    }

    public function list_alumno()
    {   
        global $db_class;
        $this->type_us = "ALUMNO";
        $r_users = self::list_user();
        $i = 0;
        $r = null;
        foreach ($r_users as  $r_user) {
            $data = array(':id_user' => $r_user['id_user'] );
            $sql = "SELECT b.code,b.id_bloque FROM bloques as b inner join bloque_alumnos as ba on ba.id_bloque = b.id_bloque where ba.id_user_alumno = :id_user limit 1";
            $bloque = $db_class->query($sql,$data,'ROW');

            if ($bloque == false) {
               $bloque['code'] = '';
               $bloque['id_bloque'] = '';
               
            }
           $r_users[$i]['bloque'] = $bloque['code'];
           $r_users[$i]['id_bloque'] = $bloque['id_bloque'];

           if ($r_users[$i]['status'] == 'ACTIVO') {
              $r[] = $r_users[$i];
           }
           $i++;
        }

        return $r;
    }

    
    
}


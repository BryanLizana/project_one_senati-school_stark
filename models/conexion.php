<?php 
/**
 * 
 */
class DB
{
    private $host = "localhost";
    private $user_server = "root";
    private $pass_server = "";
    private $name_database = "db_school_stark";
    private $db;
    function __construct()
    {
        try {
         $this->db = new PDO('mysql:host='.$this->host.';dbname='.$this->name_database.'', $this->user_server, $this->pass_server);
         
        } catch (PDOException $e) {
            echo '<pre>'; var_dump( $e ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
            die();
        } catch (Exception $e) {
            
            echo '<pre>'; var_dump( $e ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
        // $e->message() ;
        die();
        }
    }

    public function db()
    {
            return $this->db;
    }

    public function query($sql_prepare,$array_data = null,$type = "ALL")
    {
        //try catch
        //**¡¡

       
        $prepare =    $this->db->prepare($sql_prepare);
        $prepare->execute($array_data);
        //Dependiendo del tipo de la consulta devolver un tipo de resultado en específico
        //ALL : Lista completa o datos de un solo usuario
        //INSERT|UPDATE El Id que se ha ingresado o actualizado
       switch ($type) {
           case 'ALL':
                $datalist =   $prepare->fetchAll();
               break;
           case 'INSERT':
           case 'UPDATE':
                $datalist =  $this->db->lastInsertId();
               break;       
           default:
              $datalist =   $prepare->fetch();
               break;
       }
        return $datalist;
    }
}


$db_class = new DB();
$db = $db_class->db();


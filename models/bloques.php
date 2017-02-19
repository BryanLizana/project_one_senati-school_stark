<?php 
require_once('/conexion.php');

/**
 * 
 */
class Bloques       
{
    public $id_bloque;
    public $code;
    public $seccion;
    public $grado;
    public $status;
    public $num_max_vacante;
    public $num_actual_alu;
    
    function __construct()
    {
        # code...
    }

    public function save_bloque()
    {
                global $db_class;
                //params
                $data = array(  ':id_bloque' =>  $this->id_bloque  ,  
                                  ':seccion' =>  $this->seccion ,
                                  ':code' =>  $this->code ,
                                  ':grado' =>  $this->grado ,
                                  ':num_max_vacante' =>  $this->num_max_vacante 
                                 );
                    //validate data
                    $data_validate = $data;
                    unset($data_validate[':code']);
                     $data_validate[':bloques_code'] =  $this->code;
                    $validate =  new Validate();                   
                    $validate->data  = $data_validate ;
                    $validate->table  = "bloques" ;
                    $validate->id_table = $this->id_bloque ;
                    $validate->id_table_field = "id_bloque" ;                     
                    $r_validate =  $validate->validate();
                    if ( $r_validate !== 1) {
                        $r = $r_validate;
                    }else {

                            // **¡¡¡ try
                            //validate unique data - code
                            if (!empty($this->id_bloque) ) {
                                //edit any bloque
                                $sql = "UPDATE bloques set code = :code,seccion = :seccion,grado = :grado,num_max_vacante = :num_max_vacante, status='ACTIVO' where id_bloque = LAST_INSERT_ID(:id_bloque)  ;
                                 ";        
                                $r = $db_class->query($sql,$data,"UPDATE");
                            }else {

                                unset($data[':id_bloque']);
                                //new any bloque
                                $sql = "INSERT INTO bloques(code,seccion,grado,num_max_vacante) VALUES(:code,:seccion,:grado,:num_max_vacante)";
                                $r = $db_class->query($sql,$data,"INSERT"); 
                            }
                    }
                    
              

                    // Result:  id_bloque insert or edit | null 
                    return $r;
                
    }

    public function delete_bloque()
    {
           //    delete
           global $db_class;
           $data = array(':status' => 'INACTIVO', ':id_bloque' => $this->id_bloque );
           $sql = "UPDATE bloques SET status= :status where id_bloque = :id_bloque";
           $r = $db_class->query($sql,$data);
            return $r;
        
    }

    public function list_bloque()
    {
            global $db_class;


            if (empty($this->id_bloque) ) {

                    //list all bloques
                $sql = "SELECT * FROM bloques";
                $r  = $db_class->query($sql);
            }else {

                    // List bloque specific
                $sql = "SELECT * FROM bloques where id_bloque = :id_bloque";
                $data = array(':id_bloque' => $this->id_bloque );
                $r =  $db_class->query($sql,$data);
                
            }

            unset($sql);
            unset($data);
            // Result:  list  | null 
            return $r;
    }


    public function list_bloque_vacantes()
    {
        global $db_class;
        //list all bloques with vacantes
        $sql = "SELECT * FROM bloques where num_actual_alu < num_max_vacante";
        $r  = $db_class->query($sql);
        unset($sql);
        // Result:  list  | null 
        return $r;
    }

    public function update_vacante()
    {
      global $db_class;
      $data = array(':id_bloque' => $this->id_bloque );
      $sql = "UPDATE bloques set num_actual_alu= (num_actual_alu + 1) where id_bloque = :id_bloque";
      $r = $db_class->query($sql,$data,"UPDATE");
    }

    public function delete_vacante()
    {
      global $db_class;
      $data = array(':id_bloque' => $this->id_bloque );
      $sql = "UPDATE bloques set num_actual_alu= (num_actual_alu - 1) where id_bloque = :id_bloque";
      $r = $db_class->query($sql,$data,"UPDATE");
    }
    
}

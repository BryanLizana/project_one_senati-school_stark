<?php 
/**
 * 
 */
class Validate 
{
    public $data;
    public $require;
    public $table;
    private $message_error_alternative = null;
    public $type_sql = null;
    
    
    
    function __construct()
    {
        # code...
    }


    public function validate()
    {
        $r = 1;
        
        // echo '<pre>'; var_dump( file_exists($_SERVER['DOCUMENT_ROOT'].'/controllers/params_validate.json') ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
        $params = file_get_contents($_SERVER['DOCUMENT_ROOT'].'/controllers/params_validate.json');
        $data_params = json_decode($params,true);
        foreach ($data_params as   $key => $value) {
           if (strpos($value,'require')  !== false ) {
               $condition_explode_ = explode("|",$value);
               foreach ($condition_explode_ as  $value_) {
                  if (strpos($value_,'require')  !== false ) {
                           $condition_explode = explode(",",$value_);
                            unset($condition_explode[0]);
                            if ($this->table == $condition_explode[1]) {
                                $this->message_error_alternative = "EL campo ".$key." es requerido";
                                $r = self::if_validate( isset($this->data[$key]) && !empty($this->data[$key]) ,$key); 
                                if ($r !== 1) {
                                    return $r;
                                }
                            }
                  }
               }

            
           }
        }
      if ($r == 1) {
            if (is_array($this->data)) {
                
            foreach ($this->data  as $key => $value) {
                if (isset($data_params[$key]) && !empty($value) ) {
                        $r = self::validate_value($value,$data_params[$key],$key);
                        if ($r !== 1) {
                            break;
                        }
                }
            }
            }else {

            }
      }

       return $r;
        

    }

    private function validate_value($value,$conditions,$key)
    {
        //decodificar condiciones
        //por |
        $array_condition =   explode("|",$conditions);
        unset($conditions);
        $r =  1;
        foreach ($array_condition as  $condition) {
           switch ($condition) {
               case 'onlynumber':
                   # code...                   
                   $r = self::if_validate(preg_match('/^[0-9+ ]+$/',$value),$key,true);                  
                   break; 
               case 'int':
                   # code...
                   $r = self::if_validate(filter_var($value, FILTER_VALIDATE_INT),$key );
                   break;
               case 'string':
                   # code...
                   $r = 1;
                   break;
               case 'onlyletter':
                   # code...
                   $r = self::if_validate(preg_match('/^[a-zA-Z ]+$/',$value),$key,true);
                   break;
               case 'email':
                   # code...
                   $r = self::if_validate(filter_var($value, FILTER_VALIDATE_EMAIL),$key);
                   break;                                                                                                                             
               default:
                   # code...
                   if (strpos($condition,'only') !== false) {
                      $value_specific = explode(",",$condition);
                      unset($value_specific[0]);
                     $r = self::if_validate(in_array($value,$value_specific),$key);
                   }else if (strpos($condition,'length')  !== false ) {
                      $condition_explode = explode(",",$condition);
                      unset($condition_explode[0]);
                      $this->message_error_alternative = "El valor de ".$key." es muy largo";
                     $r = self::if_validate( strlen($value) <=  $condition_explode[1] ,$key);                     
                   }else if(strpos($condition,'unique')  !== false){                       
                      $condition_explode = explode(",",$condition);
                      unset($condition_explode[0]);
                      $this->message_error_alternative = "El valor de ".$key."  ya está en uso, ingrese otro.";
                      $result = self::value_unique($value,$condition_explode[1],$key);
                      $r =  self::if_validate($result,$key);

                   }else {
                       
                   }
                   break;              
           }

           if ($r !== 1) {
              break;
           }


        }
        return $r ;

    }


    private function if_validate($validate_r,$key,$r_no_bool =  false)
    {
        if ($r_no_bool) {       
           $validate_r = ( $validate_r == 0 ) ? false : true;
        }

        if ($validate_r === false  ) {            
              //break
            if ($this->message_error_alternative === null) {
                 $message_error = "El ". ucwords(str_replace('_',' ',$key)) . " no es válido";
            }else {
                 $message_error = $this->message_error_alternative;                
            }
            // echo '<pre>'; var_dump( $message_error ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
             $this->message_error_alternative = null;
            return $message_error;

        }else {
           $this->message_error_alternative = null;
           return 1;
        }
    }

    private function value_unique($value, $table ,$key)
    {
         
       global $db_class;
       if (isset($db_class)) {
        //    $data_sql = array(':table' => $table,':key' => $key, ':value'=>$value);
           $data_sql = array( ':value'=>$value);
           $table =   preg_replace('([^A-Za-z0-9_-])', '', $table);
           $key =   preg_replace('([^A-Za-z0-9_-])', '', $key);
           $key = str_replace($table.'_','',$key); //parche
           $r = $db_class->query("SELECT ".$key." FROM ". $table ." WHERE ".$key." = :value ",$data_sql);
           if ($r == null) {
               //ok
              return true;
           }else {
               $data_sql = array( ':'.$this->id_table_field => $this->id_table );
               $r_old = $db_class->query("SELECT ".$key." FROM ". $table ." WHERE ".$this->id_table_field." = :".$this->id_table_field,$data_sql);
                if ( !empty( $this->id_table) && $r[0][$key] == $r_old [0][$key]  ) {
                    return true;
                }else {
                    return false;
                }

            //    if ($this->type_sql == "INSERT"   ) {
            //    //error                   
            //     return false;
            //    }else if ($this->type_sql == "UPDATE" ){
            //         echo '<pre>'; var_dump(  $value ); echo '</pre>'; 
            //        if ($r[0][$key]  == $value) { //Si el valor original es igual al valor de la tabla permitir 
            //             return true;
            //        }else {
            //             return false;
            //        }
            //    }
           }
       }else {
           echo '<pre>'; var_dump( 'Imposible validar ese campo'. $key ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
       }
    }
}

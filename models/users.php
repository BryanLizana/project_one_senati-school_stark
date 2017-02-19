<?php 
require_once('conexion.php');
require_once(ROOT.'/controllers/validate.php');

/**
 * 
 */
class Users                 
{

 
    public $id_user = null;
    public $name = null;
    public $last_name = null;
    public $code = null;    // DNI of User
    public $type_us = null; // ALUMNO | DOCENTE | ADMIN | ROOT
    public $password = null;
    public $status = null; //ACTIVO | INACTIVO

    // --- OPERATIONS ---
    function __construct()
    {
        # code...
    }

    public function login()
    {
        // $this->code;
        // $this->password;
        global $db;
        if (!empty( $this->code)  && !empty( $this->password)) {
            $prepare =    $db->prepare("select * from users where code = :code and password=:password and status = 'ACTIVO'");
            $prepare->execute(array(':code' => $this->code,':password'=> $this->password ));
            $data_user =   $prepare->fetch();

            if (isset($data_user['code'])) {
                return $data_user;                
            }else {
                return null;
            }
        }
       
    }

    public function list_nav()
    {
        global $db_class;

        ///Specifies type user
       $data = array(':type_us' => $this->type_us );

       ///List menu for a specific user type
       $data_list =  $db_class->query("SELECT name,code_menu FROM menu where type_us = :type_us",$data);
        unset($data);
       return $data_list;
    }

    public function save_user()
    {
            global $db_class;
         
               
                if (true ) {



                    //params}
                    $data = array(':id_user' =>  $this->id_user  ,   //id_user   
                                  ':name' =>  $this->name ,
                                  ':last_name' =>  $this->last_name ,
                                  ':code' =>  $this->code ,
                                  ':email' =>  $this->email ,
                                  ':phone' =>  $this->phone  , 
                                  ':password' =>  $this->password  ,   
                                  ':type_us' =>  $this->type_us   //specifies  if is alumno|docente|admin|root                                                                                                                              
                                 );
                    //validate data

                    $validate =  new Validate();                   
                    $validate->data  = $data ;
                    $validate->table  = "users" ;
                    $validate->id_table = $this->id_user ;
                    $validate->id_table_field = "id_user" ;                     
                    $r_validate =  $validate->validate();
                    if ( $r_validate !== 1) {
                        $r = $r_validate;
                    }else {
                            // **¡¡¡
                            //validate unique data - code
                            if (!empty($this->id_user) ) {

                                //edit any user
                                $sql = "UPDATE users set name = :name,last_name = :last_name,code = :code,email = :email,phone = :phone,password = :password,type_us = :type_us ,status='ACTIVO'where id_user = LAST_INSERT_ID(:id_user)  ;
                                 ";        
                                $r = $db_class->query($sql,$data,"UPDATE");
                            }else {

                                unset($data[':id_user']);
                                //new any user
                                $sql = "INSERT INTO users(name,last_name,code,email,phone,password,type_us) VALUES(:name,:last_name,:code,:email,:phone,:password,:type_us)";        
                                $r = $db_class->query($sql,$data,"INSERT"); 
                            }
                    }
                    

                    // Result:  Id_user insert or edit | null 
                    return $r;
                }else {
                    return null;
                }
        }

        public function list_user()
        {
            global $db_class;


            if (empty($this->id_user) ) {

               if (empty($this->type_us)) {
                    //list all Users
                    $sql = "SELECT * FROM users";
                    $r  = $db_class->query($sql);
               }else {
                   //list all Users by type_us
                    $data = array(':type_us' => $this->type_us );
                    $sql = "SELECT * FROM users where type_us = :type_us";
                    $r  = $db_class->query($sql,$data);
               }
            }else {

                    // List User specific
                $sql = "SELECT * FROM users where id_user = :id_user";
                $data = array(':id_user' => $this->id_user );
                $r =  $db_class->query($sql,$data);
                
            }

            unset($sql);
            unset($data);
            // Result:  list  | null 
            return $r;
        }

        public function delete_user()
        {
           //    delete
           global $db_class;
           $data = array(':status' => 'INACTIVO', ':id_user' => $this->id_user );
           $sql = "UPDATE users SET status= :status where id_user = :id_user";
           $r = $db_class->query($sql,$data);
            return $r;

        }

}

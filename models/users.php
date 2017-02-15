<?php 
require_once('conexion.php');

/**
 * 
 */
class Users                 
{

    /**
     * Short description of attribute id_user
     *
     * @access public
     * @var Integer
     */
    public $id_user = null;

    /**
     * Short description of attribute name
     *
     * @access public
     * @var String
     */
    public $name = null;

    /**
     * Short description of attribute last_name
     *
     * @access public
     * @var String
     */
    public $last_name = null;

    /**
     * Short description of attribute code
     *
     * @access public
     * @var string
     */
    public $code = '';

    /**
     * Short description of attribute type_us
     *
     * @access public
     * @var String
     */
    public $type_us = null;

    /**
     * Short description of attribute password
     *
     * @access public
     * @var String
     */
    public $password = null;

    /**
     * Short description of attribute status
     *
     * @access public
     * @var Integer
     */
    public $status = null;

    // --- OPERATIONS ---
    function __construct()
    {
        # code...
    }

    /**
     * Short description of method login
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  code
     * @param  password
     * @return mixed
     */
    public function login()
    {
        // $this->code;
        // $this->password;
        global $db;
        if (!empty( $this->code)  && !empty( $this->password)) {
            $prepare =    $db->prepare("select * from users where code = :code and password=:password ");
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
        global $db;
        $db->query("SELECT * FROM ");
    }

}

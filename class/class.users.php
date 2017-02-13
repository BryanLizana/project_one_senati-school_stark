<?php

error_reporting(E_ALL);

/**
 * modelo sin título - class.users.php
 *
 * $Id$
 *
 * This file is part of modelo sin título.
 *
 * Automatically generated on 11.02.2017, 23:30:04 with ArgoUML PHP module 
 * (last revised $Date: 2010-01-12 20:14:42 +0100 (Tue, 12 Jan 2010) $)
 *
 * @author firstname and lastname of author, <author@example.org>
 */

if (0 > version_compare(PHP_VERSION, '5')) {
    die('This file was generated for PHP 5');
}

/* user defined includes */
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000996-includes begin
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000996-includes end

/* user defined constants */
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000996-constants begin
// section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000996-constants end

/**
 * Short description of class users
 *
 * @access public
 * @author firstname and lastname of author, <author@example.org>
 */
class users
{
    // --- ASSOCIATIONS ---


    // --- ATTRIBUTES ---

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

    /**
     * Short description of method login
     *
     * @access public
     * @author firstname and lastname of author, <author@example.org>
     * @param  code
     * @param  password
     * @return mixed
     */
    public function login($code, $password)
    {
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AC3 begin
        // section -64--88-10-1-34f6c14a:15a2efaa323:-8000:0000000000000AC3 end
    }

} /* end of class users */

?>
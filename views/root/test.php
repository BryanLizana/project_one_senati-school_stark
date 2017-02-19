<?php 

$validate =  new Validate();
$validate->table = "users";
$validate->data =  array('id_user' => '1' ,
                            'name' => "asd" ,
                            'last_name' => "asd" ,
                            'email' => "blizanaa@aeonlinesolutions.com" ,
                            'password' => "test@test.com" ,
                            'code' => "123" ,
                        );

$r = $validate->validate();
echo '<pre>'; var_dump( $r ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
<?php if($_SERVER['REQUEST_METHOD'] == 'POST'):  ?>
  <?php  if( isset($_REQUEST['code']) &&  !empty($_REQUEST['code']) &&  isset($_REQUEST['password']) &&  !empty($_REQUEST['password']) ):  ?>
        <?php 
            //Add Class Users()
            require_once('../../models/users.php');

            //Add Functions Globals
            require_once('../../controllers/functions.php');
            
            $user =  new Users();

            //add params
            $user->code = $_REQUEST['code'];
            $user->password = $_REQUEST['password'];
            
           $usuario =  $user->login();
            if (isset($usuario)) {
             //upload data to a SESSION
             up_to_session_user($usuario);
             //Redirect to your page by type of user
             header('location:/'.strtolower($_SESSION['user']['type_us']).'/');
            }else {
            $error = "Usuario o password incorrectos";
            }
        
         ?>

    <?php else: ?>
    <?php 
    $error = "Campos no válidos";
    ?>
    <?php  endif;  ?>
<?php  endif;  ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="/views/assets/css/pure.css" rel="stylesheet">
        <link href="/views/assets/css/main.css" rel="stylesheet">
    </head>
   <body class="content">
    <form class="pure-form" method="POST" >
    <fieldset>
        <h1>Bienvenido</h1>

        <input name="code" type="text" placeholder="Code"><br><br>
        <input name="password"  type="password" placeholder="Password"><br><br>
        <label for="error"><?php  echo $error = ( isset($error) && !empty($error) ) ? $error : "" ?></label><br>
        <label for="remember">
            <!--<input id="remember" type="checkbox"> Remember me-->
        </label>

        <button type="submit" class="pure-button pure-button-primary">Sign in</button>
    </fieldset>
</form>
    </body>
</html>
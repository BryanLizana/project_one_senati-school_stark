<!-- Menu de navegación -->
<a href="#menu" id="menuLink" class="menu-link">
    <!-- Hamburger icon -->
    <span></span>
</a>
<div id="menu">
    <div class="pure-menu">
        <a class="pure-menu-heading" href="<?php echo '/'.strtolower($_SESSION['user']['type_us']).'/' ?>">School Stark</a>

        <ul class="pure-menu-list">
            <?php 
                //listar los modulos del usuario actual
                $user =  new Users();
                $user->type_us =  $_SESSION['user']['type_us'];
                $list_nav = $user->list_nav();//devuelve un array con los modulos
             ?>
             <?php foreach ($list_nav as $nav): ///listar los módulos ?>
             <?php $url_nav = '/'.strtolower($_SESSION['user']['type_us']).'/'.$nav['code_menu'].'/' ; ?>
                <li class="pure-menu-item"><a href="<?php echo $url_nav ?>" class="pure-menu-link"><?php echo  $nav['name'] ?></a></li> 
             <?php endforeach ?>
                <li class="pure-menu-item"><a href="/logout/" class="pure-menu-link">Logout</a></li>
        </ul>
    </div>
</div>

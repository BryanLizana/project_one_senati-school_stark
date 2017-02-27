       <?php error_reporting(0); ?>
       <?php //template estandar de para rellenar datos de un usuario ?>
        <div class="pure-control-group">
            <label for="id">Usuario ID </label>
            <input id="id" name="id_user_text" name="id_user"  type="text" disabled placeholder="ID" value="<?php echo($data['id_user']) ?>" >
            <input type="hidden" name="id_user" value="<?php echo($data['id_user']) ?>">
        </div>
        <div class="pure-control-group">
            <label for="dni">DNI</label>
            <input id="dni" name="code"  type="number" placeholder="DNI" value="<?php echo($data['code']) ?>" >
            
        </div>        
        <div class="pure-control-group">
            <label for="name">Nombres</label>
            <input id="name" name="name"  type="text" placeholder="Nombre" value="<?php echo($data['name']) ?>" >
            
        </div>
        <div class="pure-control-group">
            <label for="lastname">Apellidos</label>
            <input id="lastname" name="last_name"  type="text" placeholder="Apellidos" value="<?php echo($data['last_name']) ?>" >
            
        </div>
        <div class="pure-control-group">
            <label for="type">Tipo de Usuario</label>
            <input id="type" name="type_us"  type="text" placeholder="Tipo de User" value="<?php echo($data['type_us']) ?>" >
        </div>
        <div class="pure-control-group">
            <label for="email">Email Address</label>
            <input id="email" name="email"  type="email" placeholder="Email" value="<?php echo($data['email']) ?>" >
        </div>

        <div class="pure-control-group">
            <label for="phone">Phone</label>
            <input id="phone" name="phone"  type="number" placeholder="Phone" value="<?php echo($data['phone']) ?>" >
        </div>

        <div class="pure-control-group">
            <label for="password">Password</label>
            <input id="password" name="password"  type="password" placeholder="Password" value="<?php echo($data['password']) ?>" >
        </div>


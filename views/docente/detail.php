<div class="main">
    <h3>Informacion del Usuario</h3>
    <table class="pure-table">
        <tr>
            <td>Nombre</td>
            <td><?php echo $_SESSION['user']['name'] ?></td>
        </tr>
        <tr>
            <td>Apellido</td>
            <td><?php echo $_SESSION['user']['last_name'] ?></td>
        </tr>
        <tr>
            <td>DNI</td>
            <td><?php echo $_SESSION['user']['code'] ?></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><?php echo $_SESSION['user']['email'] ?></td>
        </tr>
        <tr>
            <td>Typo de Usuario</td>
            <td><?php echo $_SESSION['user']['type_us'] ?></td>
        </tr>
    </table>
</div>
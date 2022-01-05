<?php

include './conexionDB.php';

// CREAR REGISTRO - CREATE
//insertarRegistro("anapz","anapz1234", "ana@local,com", $conexion);
//leerRegistros($conexion);

// LEER REGISTROS - READ
//leerRegistros($conexion);

// ACTUALIZAR REGISTRO - UPDATE
//actualizarRegistro(5, "luisrm","luisrm1234", "luis@local.com", $conexion);
//leerRegistros($conexion);

// BORRAR REGISTRO - DELETE
borrarRegistro(5, $conexion);
leerRegistros($conexion);

?>

<?php
function borrarRegistro($idUsuario, $conexion){
    $sql = "DELETE FROM usuarios WHERE `idUsuario`=:idUsuario;";

    $consulta = $conexion->prepare($sql);
    
    $consulta->bindParam(':idUsuario', $idUsuario);

    $consulta->execute();

    if($consulta->rowCount() > 0){
        echo "SE ELEMINO CORRECTAMENTE";
    } else {
        echo "NO SE PUDO ELIMINAR";
    }
}
?>

<?php
function actualizarRegistro($idUsuario, $nuevoUsuario, $nuevaContrasena, $nuevoEmail, $conexion){
    $sql = "UPDATE usuarios SET `usuario`=:nuevoUsuario, `contrasena`=:nuevaContrasena, `email`=:nuevoEmail WHERE `idUsuario`=:idUsuario;";
    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':nuevoUsuario', $nuevoUsuario);
    $consulta->bindParam(':nuevaContrasena', $nuevaContrasena);
    $consulta->bindParam(':nuevoEmail', $nuevoEmail);
    $consulta->bindParam(':idUsuario', $idUsuario);

    $consulta->execute();

    if($consulta->rowCount() > 0){
        echo "SE ACTUALIZO CORRECTAMENTE";
    } else {
        echo "NO SE PUDO ACTUALIZAR";
    }
}
?>


<?php
function insertarRegistro($usuario, $contrasena, $email, $conexion){
    $sql = "INSERT INTO usuarios(usuario, contrasena, email) VALUES(:usuario, :contrasena, :email)";

    $consulta = $conexion->prepare($sql);

    $consulta->bindParam(':usuario', $usuario);
    $consulta->bindParam(':contrasena', $contrasena);
    $consulta->bindParam(':email', $email);

    $consulta->execute();

    $registroID = $conexion->lastInsertId();
    if($registroID > 0){
        echo "SE INSERTO DE FORMA CORRECTA";
    } else {
        echo "NO SE PUDO INSERTAR";
    }
}
?>

<?php
function leerRegistros($conexion) {
?>

<table border="1">
    <thead>
        <th>ID</th>
        <th>USUARIO</th>
        <th>CONTRASEÑA</th>
        <th>EMAIL</th>
    </thead>
    <tbody>
        <?php
        $sql = "SELECT * FROM usuarios;";

        $consulta = $conexion->prepare($sql);
        $consulta->execute();

        while($registo = $consulta->fetch(PDO::FETCH_OBJ)){
            ?>

            <tr>
                <td><?php echo $registo->idUsuario; ?></td>
                <td><?php echo $registo->usuario; ?></td>
                <td><?php echo $registo->contrasena; ?></td>
                <td><?php echo $registo->email; ?></td>
            </tr>

            <?php
        }
        ?>
    </tbody>
</table>

<?php
}
?>
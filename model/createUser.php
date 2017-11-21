<?php
echo "estoy aqui";
function insertarUsuario()
{
    $objData = new ConnectDB();
    echo "estoy en Conext2";


    $nombre_usuario = $_POST['nombre'];
    $password_usuario = $_POST['password'];
    $email_usuario = $_POST['email'];
    $direccion_usuario = $_POST['address'];
    $poblacion_usuario = $_POST['ciudad'];
    $cp_usuario = $_POST['cp'];
    $usuario_activo = 0;

    $stmt = $objData->prepare('INSERT INTO Usuarios (nombre_usuario, password_usuario, email_usuario, direccion_usuario, poblacion_usuario, cp_usuario, usuario_activo) '
        . 'VALUES (:nombre_usuario, :password_usuario, :email_usuario, :direccion_usuario, :poblacion_usuario, :cp_usuario, :usuario_activo)');

    $stmt->bindParam('nombre_usuario', $nombre_usuario);
    $stmt->bindParam('email_usuario', $email_usuario);
    $password_usuario= hash('sha256', $password_usuario); //Password encryption
    $stmt->bindParam("password_usuario", $password_usuario,PDO::PARAM_STR);
    $stmt->bindParam('direccion_usuario', $direccion_usuario);
    $stmt->bindParam('poblacion_usuario', $poblacion_usuario);
    $stmt->bindParam('cp_usuario', $cp_usuario);
    $stmt->bindParam('usuario_activo', $usuario_activo);

    echo "estoy en Conext3";
    $stmt->execute();
    echo "estoy en Conext4";

}
?>

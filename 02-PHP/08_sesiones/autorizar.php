<?php
//Inicia servicio de sesiones
session_start();

//Obtener usuario y clave del usuario que desea logearse.
if(isset($_POST["nombre"]) && isset($_POST["clave"])){
    $nombre = $_POST['nombre'];
    $clave = $_POST['clave'];

    //seteo la sesion
    $_SESSION['session_nombre'] = $nombre;

    //Verificar si el usuario seleccionó recordarme. Si es así, creo las cookies
    if(isset($_POST['recordarme'])){
        setcookie("cookie_nombre", $nombre, time() + 60*60*24);
        setcookie("cookie_clave", $clave, time() + 60*60*24);
    }else{
        //Elimino las cookies si estas existen.
        if(isset($_COOKIE)){
            foreach($_COOKIE as $name => $value){
                setcookie($name,'',1);
            }
        }
    }
    header("Location:panel_principal.php");
}else{
    header("Location:index.php");
}

?>
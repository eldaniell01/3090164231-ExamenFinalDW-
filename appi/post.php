<?php
    require_once('./cors.php');
    require_once('./bd.php');
    require_once('./consultas.php');
    $method =$_SERVER['REQUEST_METHOD'];
    if($method=="POST"){
    $usuario = $_POST['usuario'];
    $pass = $_POST['pass'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $opcion = $_POST['opcion'];
    if($usuario ===''||$pass ===''||$nombre===''||$correo===''||$opcion===''||$opcion==0){
        echo json_encode('error no hay datos');
    }
    else{
        $api = new consultas();
        $json = $api->adduser($usuario, $pass, $nombre, $correo, $opcion);
        echo json_encode('correcto'.$json);
    }
        /**/
    }

    
    
    
?>
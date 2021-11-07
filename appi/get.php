<?php
    require_once('./cors.php');
    require_once('./bd.php');
    require_once('./consultas.php');
    $method =$_SERVER['REQUEST_METHOD'];
    if($method =="GET"){
        if(!empty($_GET['id'])){
            $id=$_GET['id'];
            $api = new consultas();
            $obj =$api->getmultiusers($id);
            $json = json_encode($obj);
            echo $json;
        }else{
            $vector = array();
            $api = new consultas();
            $vector = $api->getusers();
            $json = json_encode($vector);
            echo $json;
        }
    }

    
    
    
?>
<?php
   header('Access-Control-Allow-Origin: *');
   header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
   header("Content-Type: text/html; charset=utf-8"); 
    

    class conexion{
        
        public function getconexion(){
            $host = 'localhost:3306';
            $dbname = 'evaluación';
            $username = 'root';
            $password = '12Intercambios';
            /*
            $host = 'mysql5045.site4now.net';
            $dbname = 'db_a7b1db_hotel';
            $username = 'a7b1db_hotel';
            $password = 'lamaquina123';*/
            try{
                $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                return $conn;
            }catch(PDOException $e){
                echo "error".$e;
                return $conn;
            }
        }

    }
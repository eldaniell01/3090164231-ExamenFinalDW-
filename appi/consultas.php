<?php 
    class consultas{
        public function getusers(){
            $vector =array();
            $conexion = new conexion();
            $bd = $conexion->getconexion();
            $sql = "select *from pacientes";
            $consult = $bd->prepare($sql);
            $consult->execute();
            while($fila=$consult->fetch()){
                $vector[] = array(
                    "id" => $fila["id"],
                    "usuario"=> $fila['usuario'],
                    "pass"=>$fila['pass'],
                    "nombre"=>$fila['nombre'],
                    "correo"=>$fila['correo'],
                    "tipo_id"=>$fila['tipo_id'],
    
                );
            }
            return $vector;
        }
        public function getmultiusers($id){
            $vector =array();
            $conexion = new conexion();
            $bd = $conexion->getconexion();
            $sql = "SELECT *FROM usuario WHERE id=:id";
            $consult = $bd->prepare($sql);
            $consult->bindParam(':id', $id);
            $consult->execute();
            while($fila=$consult->fetch()){
                $vector[] = array(
                    "id" => $fila["id"],
                    "nombre"=> $fila['nombre'],
                    "apellido"=>$fila['apellido'],
                    "direccion"=>$fila['direccion'],
                    "telefono"=>$fila['telefono'],
                    "dpi"=>$fila['dpi'],
                    "correo"=>$fila['correo'],
                    "pass"=>$fila['pass'],
                );
            }
            return $vector[0];
        }

        public function login($correo, $pass){
            $conexion = new conexion();
            $bd = $conexion->getconexion();
            
            $sql = "SELECT * FROM usuario WHERE correo=:correo AND pass=:pass";
            $consult = $bd->prepare($sql);
            $consult->bindParam(':correo', $correo);
            $consult->bindParam(':pass', $pass);
            $consult->execute();
            while($fila=$consult->fetch()){
                $vector[] = array(
                    "id" => $fila['id'],
                    "nombre"=> $fila['nombre'],
                    "apellido"=>$fila['apellido'],
                    "direccion"=>$fila['direccion'],
                    "telefono"=>$fila['telefono'],
                    "dpi"=>$fila['dpi'],
                    "correo"=>$fila['correo'],
                    "pass"=>$fila['pass'],
                );
            }
            return $vector;
        }

        public function adduser($usuario, $pass, $nombre, $correo, $opcion){
  
            $conexion = new conexion();
            $bd = $conexion->getconexion();
            $sql = "INSERT INTO pacientes (usuario, pass, nombre, correo, tipo_id) VALUES(:usuario, :pass, :nombre, :correo, :tipo_id)";
            $consult = $bd->prepare($sql);
            $consult->bindParam(':usuario', $usuario);
            $consult->bindParam(':pass', $pass);
            $consult->bindParam(':nombre', $nombre);
            $consult->bindParam(':correo', $correo);
            $consult->bindParam(':tipo_id', $opcion);
            $consult->execute();
            
            return '{"msg":" paciente registrado registrado"}';
            
           
          }

          public function deleteuser($id){
  
            $conexion = new conexion();
            $bd = $conexion->getconexion();
            $sql = "DELETE FROM producto WHERE id=:id";
            $consult = $bd->prepare($sql);
            $consult->bindParam(':id', $id); 
            $consult->execute();
            
            return '{"msg":"usuario eliminado"}';
          }
    }
?>
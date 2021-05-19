<?php
class User_model extends CI_Model{
   function ValidarUsuario($email,$password){         //   Consulta Mysql para buscar en la tabla Usuario aquellos usuarios que coincidan con el mail y password ingresados en pantalla de login
      $query = $this->db->select('*');
      $query = $this->db->where('email',$email);   //   La consulta se efectúa mediante Active Record. Una manera alternativa, y en lenguaje más sencillo, de generar las consultas Sql.
      $query = $this->db->where('password',$password);
      $query = $this->db->get('usuario');
      return $query->row();    //   Devolvemos al controlador la fila que coincide con la búsqueda. (FALSE en caso que no existir coincidencias)
   }
   function crear_usuario($usuario_nuevo,$direccion){
      $query = $this->db->insert("usuario",$usuario_nuevo);
      if($query){
         $query = $this->db->insert("usuario_direccion",$direccion);
      }else{
         return $query;

      }     
   }
   function crear_tienda($usuario_nuevo, $direccion, $nuevaTienda){
      $query = $this->db->insert("usuario",$usuario_nuevo);
      if($query){
         $query = $this->db->insert("usuario_direccion",$direccion);
         if($query){
            $query = $this->db->insert("tienda",$nuevaTienda);            
         }
      }else{
         return $query;
      }  
      
   }
   function getTienda($rut_usuario){
      $query = $this->db->select('id_tienda');
      $query = $this->db->join('usuario', ' tienda.rut_usuario = usuario.rut_usuario');
      $query = $this->db->where('usuario.rut_usuario',$rut_usuario);
      $res = $this->db->get('tienda');
      return $res->row();
   }
   function getComunas(){

      $res = $this->db->get('comuna');
      return $res->result();

   }
}

?>
<?php
class Categorias_model extends CI_Model{

   function getCategorias(){
        $query = $this->db->get('categoria');
        return $query->result();
   }
}

?>
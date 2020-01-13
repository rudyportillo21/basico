<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clienteM extends CI_Model {
	public function get_cliente(){
		$this->db->select('c.id_cliente,c.nombre,c.apellido,s.suscripcion,g.genero');
		$this->db->from('clientes c');
		$this->db->join('suscripcion s','s.id_suscripcion=c.id_suscripcion');
		$this->db->join('genero g','g.id_genero=c.id_genero');
		$exe = $this->db->get();
		return $exe->result();

	}

	public function eliminar($id){
		$this->db->where('id_cliente',$id);
		$this->db->delete('clientes');
		if($this->db->affected_rows()>0){
			return "eli";
		}else{
			return false;
		}
	}

	public function get_suscripcion(){
		$exe = $this->db->get('suscripcion');
		return $exe->result();
	}
	public function get_genero(){
		$exe = $this->db->get('genero');
		return $exe->result();
	}

	public function ingresar($datos){
		$this->db->set('nombre',$datos['nombre']);
		$this->db->set('apellido',$datos['apellido']);
		$this->db->set('id_suscripcion',$datos['suscripcion']);
		$this->db->set('id_genero',$datos['genero']);
		$this->db->insert('clientes');

		if($this->db->affected_rows()>0){
			return "add";
		}else{
			return false;
		}

	}

	public function get_datos($id){
		$this->db->where('id_cliente',$id);
		$exe = $this->db->get('clientes');
		return $exe->result();
	}


	public function actualizar($datos){
		$this->db->set('nombre',$datos['nombre']);
		$this->db->set('apellido',$datos['apellido']);
		$this->db->set('id_suscripcion',$datos['suscripcion']);
		$this->db->set('id_genero',$datos['genero']);
		$this->db->where('id_cliente',$datos['id_cliente']);
		$this->db->update('clientes');

		if($this->db->affected_rows()>0){
			return "edi";
		}else{
			return false;
		}
	}
}

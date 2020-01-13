<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class clienteC extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('clienteM');
	}
	public function index()
	{
		$data = array('title'=>'Gimnasio || cliente',
			'cliente'=>$this->clienteM->get_cliente(),
			'suscripcion'=>$this->clienteM->get_suscripcion(),
			'genero'=>$this->clienteM->get_genero());
		$this->load->view('template/header',$data);
		$this->load->view('clienteV');
		$this->load->view('template/footer');
	}



	public function eliminar($id){
		$respuesta = $this->clienteM->eliminar($id);
		$data = array('title'=>'Gimnasio || cliente',
			'cliente'=>$this->clienteM->get_cliente(),
			'suscripcion'=>$this->clienteM->get_suscripcion(),
			'genero'=>$this->clienteM->get_genero(),
			'msj'=>$respuesta);
		$this->load->view('template/header',$data);
		$this->load->view('clienteV');
		$this->load->view('template/footer');
	}


	public function ingresar(){
		$datos['nombre'] = $this->input->post('nombre');
		$datos['apellido'] = $this->input->post('apellido');
		$datos['suscripcion'] = $this->input->post('suscripcion');
		$datos['genero'] = $this->input->post('genero');
		$respuesta = $this->clienteM->ingresar($datos);
		$data = array('title'=>'Gimnasio || cliente',
			'cliente'=>$this->clienteM->get_cliente(),
			'suscripcion'=>$this->clienteM->get_suscripcion(),
			'genero'=>$this->clienteM->get_genero(),
			'msj'=>$respuesta);
		$this->load->view('template/header',$data);
		$this->load->view('clienteV');
		$this->load->view('template/footer');
	}

	public function get_datos($id){
		$data = array('title'=>'Gimnasio || cliente',
			'datos'=>$this->clienteM->get_datos($id),
			'suscripcion'=>$this->clienteM->get_suscripcion(),
			'genero'=>$this->clienteM->get_genero());
		$this->load->view('template/header',$data);
		$this->load->view('clienteVact');
		$this->load->view('template/footer');
	}

	public function actualizar(){
		$datos['id_cliente'] = $this->input->post('id_cliente');
		$datos['nombre'] = $this->input->post('nombre');
		$datos['apellido'] = $this->input->post('apellido');
		$datos['suscripcion'] = $this->input->post('suscripcion');
		$datos['genero'] = $this->input->post('genero');
		$respuesta = $this->clienteM->actualizar($datos);
		$data = array('title'=>'Gimnasio || cliente',
			'cliente'=>$this->clienteM->get_cliente(),
			'suscripcion'=>$this->clienteM->get_suscripcion(),
			'genero'=>$this->clienteM->get_genero(),
			'msj'=>$respuesta);
		$this->load->view('template/header',$data);
		$this->load->view('clienteV');
		$this->load->view('template/footer');
	}
}

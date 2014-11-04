<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
include_once('cobro.php');
include_once('verifylogin.php');

class Test extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		if($this->session->userdata('peajetron'))
		{
			$this->load->model('categorias', '', TRUE);
			$this->load->model('cobros', '', TRUE);
			$this->load->model('vehiculos', '', TRUE);
			$this->load->model('tarifas', '', TRUE);
			$this->load->model('documentos', '', TRUE);
			$this->load->model('menu', '', TRUE);
			$this->load->model('peajes', '', TRUE);
			$this->load->model('perfiles', '', TRUE);
			$this->load->model('rutas', '', TRUE);
			$this->load->model('tarifas', '', TRUE);
			$this->load->model('ubicaciones', '', TRUE);
			$this->load->model('usuarios', '', TRUE);
			$this->load->model('vehiculo_estado', '', TRUE);
			$this->load->model('vehiculos', '', TRUE);
		}
		else
		{
			redirect('login', 'refresh');
		}
	}

	function index()
	{
		$this->test_check_vcard();
		$this->test_check_placa();
		$this->test_check_database();
		$this->test_listar_categoria();
		$this->test_combo_categoria();
		$this->test_insertarQR();
		$this->test_insertarPlaca();
		$this->test_listar_documento();
		$this->test_combo_documento();
		$this->test_ensamblar();
		$this->test_listar_peaje();
		$this->test_listar_perfiles();
		$this->test_combo_perfiles();
		$this->test_combo_rutas();
		$this->test_buscar_tarifa();
		$this->test_listar_ubicaciones();
		$this->test_combo_ubicaciones();
		$this->test_login();
		$this->test_insertar_usuario();
		$this->test_listar_usuarios();
		$this->test_combo_usuarios();
		$this->test_contrasena();
		$this->test_combo_vehiculo_estado();
		$this->test_buscar_vehiculo();
		$this->test_insertar_vehiculo();
		$datos['test'] = $this->unit->report();

		$session = $this->session->userdata('peajetron');
		$data['titulo'] = 'Usuario: '.$session['nombre'];
		$this->load->view('front/head.php', $data);
		$this->load->view('front/header.php');
		$this->load->view('test', $datos);
		$this->load->view('front/footer.php');
	}

	function test_check_vcard()
	{
		$cobro = new Cobro;
		$vcard = "BEGIN:VCARD\nVERSION:4.0\nN:AAA111\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD";
		$this->unit->run($cobro->check_vcard($vcard), true, 'Validar vcard correcta', 'Dato: BEGIN:VCARD\nVERSION:4.0\nN:AAA111\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD');
		$vcard = "BEGIN:VCARD\nVERSION:4.0\nN:AAA111\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z";
		$this->unit->run($cobro->check_vcard($vcard), false, 'Validar vcard incorrecta', 'Dato: BEGIN:VCARD\nVERSION:4.0\nN:AAA111\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z');
	}

	function test_check_placa()
	{
		$cobro = new Cobro;
		$placa = 'AAA111';
		$this->unit->run($cobro->check_placa($placa), true, 'Validar placa correcta', 'Dato: AAA111');
		$placa = 'AAa11';
		$this->unit->run($cobro->check_placa($placa), false, 'Validar placa Incorrecta', 'Dato: AAa11');
	}

	function test_check_database()
	{
		$verifylogin = new VerifyLogin;
		$contrasena = md5('123');
		$_POST['usuario'] = 'a@peajetron.com';
		$this->unit->run($verifylogin->check_database($contrasena), true, 'Validar usuario correcto', 'Dato: contrasena=123, POST[usuario]=a@peajetron.com');
		$_POST['usuario'] = 'b@peajetron.com';
		$this->unit->run($verifylogin->check_database($contrasena), false, 'Validar usuario Incorrecto', 'Dato: contrasena=123, POST[usuario]=b@peajetron.com');
	}

	function test_listar_categoria()
	{
		$this->unit->run(json_decode($this->categorias->listar()), 'is_array', 'Validar Listar Categoria');
	}

	function test_combo_categoria()
	{
		$this->unit->run(json_decode($this->categorias->combo()), 'is_object', 'Validar Combo Categoria');
	}

	function test_insertarQR()
	{
		$datos = array('id_usuario' => 1, 'id_peaje' => 1, 'vcard' => "BEGIN:VCARD\nVERSION:4.0\nN:AAA111\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD");
		$this->unit->run($this->cobros->insertarQR($datos), 0, 'Validar insertar cruceQR correcto', 'Dato: id_usuario=1, id_peaje=1, vcard=BEGIN:VCARD\nVERSION:4.0\nN:AAA111\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD');
		$datos = array('id_usuario' => 100, 'id_peaje' => 100, 'vcard' => "BEGIN:VCARD\nVERSION:4.0\nN:AAA100\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD");
		$this->unit->run($this->cobros->insertarQR($datos), 1, 'Validar insertar cruceQR Incorrecto', 'Dato: id_usuario=100, id_peaje=100, vcard=BEGIN:VCARD\nVERSION:4.0\nN:AAA100\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD');
		$datos = array('id_usuario' => 1, 'id_peaje' => 1, 'vcard' => "BEGIN:VCARD\nVERSION:4.0\nN:BAA100\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD");
		$this->unit->run($this->cobros->insertarQR($datos), 2, 'Validar insertar cruceQR Incorrecto', 'Dato: id_usuario=1, id_peaje=1, vcard=BEGIN:VCARD\nVERSION:4.0\nN:BAA100\nNOTE:46793D66609EFA224DADA69EBBAB331CBF6B3E588618B7858318429FB8FEE6E1\nREV:20140901T222710Z\nEND:VCARD');
	}

	function test_insertarPlaca()
	{
		$datos = array('id_usuario' => 1, 'id_peaje' => 1, 'placa' => "CAA111");
		$this->unit->run($this->cobros->insertarPlaca($datos), true, 'Validar insertar crucePlaca no existe correcto', 'Dato: id_usuario=1, id_peaje=1, placa=CAA111');
		$datos = array('id_usuario' => 1, 'id_peaje' => 1, 'placa' => "AAA100");
		$this->unit->run($this->cobros->insertarPlaca($datos), true, 'Validar insertar crucePlaca existe sin tarifa correcto', 'Dato: id_usuario=1, id_peaje=1, placa=AAA100');
	}

	function test_listar_documento()
	{
		$this->unit->run(json_decode($this->documentos->listar()), 'is_array', 'Validar Listar Documentos');
	}

	function test_combo_documento()
	{
		$this->unit->run(json_decode($this->documentos->combo()), 'is_object', 'Validar Combo Documentos');
	}

	function test_ensamblar()
	{
		$this->unit->run($this->menu->ensamblar(1), 'is_string', 'Validar ensamblar menu');
	}

	function test_combo_menu()
	{
		$this->unit->run(json_decode($this->documentos->combo()), 'is_object', 'Validar Combo Menu');
	}

	function test_listar_peaje()
	{
		$this->unit->run(json_decode($this->peajes->listar()), 'is_array', 'Validar Listar Peaje');
	}

	function test_listar_perfiles()
	{
		$this->unit->run(json_decode($this->perfiles->listar()), 'is_array', 'Validar Listar Perfiles');
	}

	function test_combo_perfiles()
	{
		$this->unit->run(json_decode($this->perfiles->combo()), 'is_object', 'Validar Combo Perfiles');
	}

	function test_combo_rutas()
	{
		$this->unit->run(json_decode($this->rutas->combo()), 'is_object', 'Validar Combo Rutas');
	}

	function test_buscar_tarifa()
	{
		$id_peaje = $id_categoria = 1;
		$this->unit->run($this->tarifas->buscar($id_peaje, $id_categoria), 'is_array', 'Validar buscar tarifa correcto', 'Dato: id_peaje=1, id_categoria=1');
		$id_peaje = $id_categoria = 100;
		$this->unit->run($this->tarifas->buscar($id_peaje, $id_categoria), false, 'Validar buscar tarifa Incorrecto', 'Dato: id_peaje=100, id_categoria=100');
	}

	function test_listar_ubicaciones()
	{
		$this->unit->run(json_decode($this->ubicaciones->listar()), 'is_array', 'Validar Listar Ubicaciones');
	}

	function test_combo_ubicaciones()
	{
		$this->unit->run(json_decode($this->ubicaciones->combo()), 'is_object', 'Validar Combo Ubicaciones');
	}

	function test_login()
	{
		$usuario = 'a@peajetron.com';
		$contrasena = md5('123');
		$this->unit->run(json_decode($this->usuarios->login($usuario, $contrasena)), 'is_object', 'Validar Login Correcto', 'Datos: usuario=a@peajetron.com, contrasena=123');
		$usuario = 'z@peajetron.com';
		$contrasena = md5('123');
		$this->unit->run($this->usuarios->login($usuario, $contrasena), '{"status":false}', 'Validar Login Incorrecto', 'Datos: usuario=z@peajetron.com, contrasena=123');
	}

	function test_insertar_usuario()
	{
		$datos = array('id_perfil' => 1, 'id_tipo_documento' => 1, 'id_ubicacion' => 1, 'documento' => 1, 'nombre' => 'test', 'correo' => 'test@peajetron.com', 'telefono' => 789, 'direccion' => 'test 1 # 2-3');
		$contrasena = 123;
		$this->unit->run($this->usuarios->insertar($datos, $contrasena), true, 'Validar insertar usuario', 'Dato: id_perfil=1, id_tipo_documento=1, id_ubicacion=1, documento=1, nombre=test, correo=test@peajetron.com, telefono=789, direccion=test 1 # 2-3, contraseña:123');
	}

	function test_listar_usuarios()
	{
		$this->unit->run(json_decode($this->usuarios->listar()), 'is_array', 'Validar Listar Usuarios');
	}

	function test_combo_usuarios()
	{
		$this->unit->run(json_decode($this->usuarios->combo()), 'is_object', 'Validar Combo Usuarios');
	}

	function test_contrasena()
	{
		$this->unit->run($this->usuarios->contrasena(), 'is_string', 'Validar generar contraseña');
	}

	function test_combo_vehiculo_estado()
	{
		$this->unit->run(json_decode($this->vehiculo_estado->combo()), 'is_object', 'Validar Combo Estado Vehiculo');
	}

	function test_buscar_vehiculo()
	{
		$placa = 'AAA111';
		$this->unit->run($this->vehiculos->buscar($placa), 'is_array', 'Validar buscar placa correcto', 'Dato: placa=AAA111');
		$placa = 'BAA111';
		$this->unit->run($this->vehiculos->buscar($placa), false, 'Validar buscar placa Incorrecto', 'Dato: placa=BAA111');
	}

	function test_insertar_vehiculo()
	{
		$datos = array('id_estado_vehiculo' => 1, 'placa' => 'ZAA111');
		$this->unit->run($this->vehiculos->insertar($datos), true, 'Validar insertar vehiculo correcto', 'Dato: id_estado_vehiculo=1, placa=ZAA111');
	}
}
?>

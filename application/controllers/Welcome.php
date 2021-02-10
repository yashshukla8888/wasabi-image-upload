<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct(){

			header('Access-Control-Allow-Origin: *');
			header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
			header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
			$method = $_SERVER['REQUEST_METHOD'];
			if($method == "OPTIONS") {
				die();
			}
			parent::__construct();
		}

	public function addNewUser(){
			// $this->load->Model('userFactory','uf');

			// $data = file_get_contents('php://input');
			// $data = json_decode($data,true);
			// $data = null;
			// $child['node_type'] = "right";
			// $data['user_id'] = 'UN00001';
			// $data['reg_date'] = date('Y-m-d H:i:s');
			// if(!isset($data['user_id'])){
			// 	$response = $this->uf->maxUserId();
			// 	$data['user_id'] = $response;
			// }
			// else{
			// 	$child['sponcer_id'] = $data['user_id'];
			// 	unset($data['user_id']);
			// 	$data['user_id'] = $this->uf->maxUserId();
			// }
			// $response = $this->uf->addNewUser($data,$child);
			echo true;
		}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->library('ckeditor');
		$this->ckeditor->basePath = 'asset/ckeditor/';
		$this->ckeditor->config['toolbar'] = array(
			array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList', 'Image' )
		);
		$this->ckeditor->config['language'] = 'it';
		$this->ckeditor->config['width'] = '730px';
		$this->ckeditor->config['height'] = '500px';            
		$this->ckeditor->config['extraPlugins'] = 'uploadimage';

		$this->load->view('welcome_message');
	}

		

	// //Add Ckfinder to Ckeditor
	// $this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/');

}

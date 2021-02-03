<?php
defined('BASEPATH') OR exit('No direct script access allowed');

	// $this->load->library('ckeditor');
	// $this->ckeditor->basePath = base_url().'asset/ckeditor/';
	// $this->ckeditor->config['toolbar'] = array(
	// 	array( 'Source', '-', 'Bold', 'Italic', 'Underline', '-','Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo','-','NumberedList','BulletedList' )
 //                                                    );
	// $this->ckeditor->config['language'] = 'it';
	// $this->ckeditor->config['width'] = '730px';
	// $this->ckeditor->config['height'] = '300px';            

class Welcome extends CI_Controller {

	// $this->load->library('ckfinder');

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
		$this->ckeditor->config['height'] = '300px';            
		$this->ckeditor->config['extraPlugins'] = 'uploadimage';

		$this->load->view('welcome_message');
	}

	

	// //Add Ckfinder to Ckeditor
	// $this->ckfinder->SetupCKEditor($this->ckeditor,'../../asset/ckfinder/');

}

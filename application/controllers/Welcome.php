<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

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
		$this->load->view('login');
	}	
	public function home()
	{
		$this->load->view('home');		
	}
	public function header()
	{
		$this->load->view('basic/header');		
	}
	public function footer()
	{
		$this->load->view('basic/footer');
	}
	public function side_bar()
	{
		$this->load->view('basic/side_bar');
	}
	public function main_content()
	{
		$this->load->view('main_content');
	}
	public function tasklist()
	{
		$this->load->view('tasklist');
	}
	public function location()
	{
		$this->load->view('setup/locations');
	}
	public function users()
	{
		$this->load->view('setup/users');
	}
	public function changepswd()
	{
		$this->load->view('setup/changepswd');
	}
	public function createtask()
	{
		$this->load->view('setup/createtask');
	}
		

}

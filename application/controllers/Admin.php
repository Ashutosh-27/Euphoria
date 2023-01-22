<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');

		$this->load->library('form_validation');


		$this->load->library('upload');
		$this->load->model('blogdb');
		$this->load->model('admindb');
	}


	public function index()
	{
		if($this->session->userdata('admin')){
            // print_r($this->session->userdata('admin'));
			$data['admin'] = $this->admindb->getadmin(array('admin_id'=>1));
			$data['blogs'] = $this->blogdb->getblogs();
			$data['testimonials'] = $this->blogdb->get_testimonials();
			$this->load->view('header');
			$this->load->view('admin/home',$data);
			$this->load->view('footer');
        }
		else{
        
            redirect('admin/adminlogin');
        }
	}


    public function adminlogin(){
		$data['admin'] = $this->admindb->getadmin(array('admin_id'=>1));
        $this->load->view('header');
        $this->load->view('admin/login');
        $this->load->view('footer');
    }

    public function adminloginCode(){
		$arr = array('admin_var'=>$_POST['adminloginname'],'admin_pass'=>md5($_POST['adminloginpassword']));

		$getadmin = null;
        $getadmin = $this->admindb->getadmin($arr);

		if(!empty($getadmin)){
			$this->session->unset_userdata("admin");


			$this->session->set_userdata("admin",$getadmin);

			echo json_encode(array('responsecode'=>"200","responseMessage"=>"Admin Fetched Successfully"));
		}
		else{
			echo json_encode(array('responsecode'=>"404","responseMessage"=>"Either Username is wrong or password is incorrect"));
		}
		
		
    }


	public function updateadmin(){
	
		if (!empty($_FILES['adminimg']['name'])) {

			$prefix = time();
			$image = $prefix . "-" . $_FILES['adminimg']['name'];
			$imginfo = $this->photoupload($image, "adminimg", "assets/adminImgs");

			$arr = array('admin_pic'=>$imginfo['info']['file_name'],'admin_name'=>$this->input->post('adminName'),'admin_email'=>$this->input->post('adminEmail'),'admin_var'=>$this->input->post('adminVar'));
		} else {
			$arr = array('admin_name'=>$this->input->post('adminName'),'admin_email'=>$this->input->post('adminEmail'),'admin_var'=>$this->input->post('adminVar'));


			
		}

		// print_r($_FILES['adminimg']['name']);
		// print_r($_POST['adminimg']);
		// print_r($arr);	
		// die();

		// $arr = array('admin_pic'=>$this->input->post('adminimg'),'admin_name'=>$this->input->post('adminName'),'admin_email'=>$this->input->post('adminEmail'),'admin_var'=>$this->input->post('adminVar'));


		$isupdate = $this->admindb->_updateData("admin",$arr,array('admin_id'=>$this->input->post('adminId')));

		if($isupdate){
			$getadmin = $this->admindb->getadmin(array('admin_id'=>$this->input->post('adminId')));
			$this->session->unset_userdata("admin");
			$this->session->set_userdata("admin",$getadmin);
			$this->session->set_tempdata("error","Profile Updated Succcessfully");
			redirect('admin/');
		}
		else{
			$this->session->set_tempdata("error","Unable to update the profile ");
			redirect('admin/');
		}
	}
	

	function photoupload($img, $imgname, $path)
	{
		/*image upload code*/
		$config['file_name'] = $img;
		$config['upload_path'] = $path;
		$config['allowed_types'] = 'gif|jpeg|jpg|png';
		$config['max_size'] = 5048;

		$this->load->library('upload', $config);
		$this->upload->initialize($config);
		$this->upload->set_allowed_types($config['allowed_types']);

		if (!$this->upload->do_upload($imgname)) {
			$arr = array('type' => 'error', 'info' => $this->upload->display_errors());
			return $arr;
		} else {
			$arr = array('type' => 'success', 'info' => $this->upload->data());
			return $arr;
		}
		/*image upload code end*/
	}


	function logout(){
		$this->session->sess_destroy();
		redirect('admin/');
	}
}

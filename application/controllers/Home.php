<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	

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
		$data['admin'] = $this->admindb->getadmin(array('admin_id'=>1));
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('welcome_message',$data);
		$this->load->view('footer');
	}

	public function about()
	{
		$data['admin'] = $this->admindb->getadmin(array('admin_id'=>1));
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('about',$data);
		$this->load->view('footer');
	}

	public function testimonial()
	{
		$data['testimonials'] = $this->blogdb->get_testimonials();
		$data['admin'] = $this->admindb->getadmin(array('admin_id'=>1));
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('testimonials',$data);
		$this->load->view('footer');
	}

	public function addtestimonial()
	{
		$data['admin'] = $this->admindb->getadmin(array('admin_id'=>1));
		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('add_testimonial',$data);
		$this->load->view('footer');
	}

	public function addtestimonial_db(){
		
		if($this->input->post('submit')){
			echo"hel";
			$arr = array();
			if (!empty($_FILES['user_img_testimonial']['name'])) {

				$prefix = time();
				$image = $prefix . "-" . $_FILES['user_img_testimonial']['name'];
				$imginfo = $this->photoupload($image, "user_img_testimonial", "assets/userstestimonialimages");

				$arr = array('testimonial_user_name' => $this->input->post('user_name'), 'testimonial_user_rating' => $this->input->post('rating'), 'testimonial_user_image' => $imginfo['info']['file_name'],'testimonial_user_review' => $this->input->post('user_review'));
				print_r($arr);
			} else {
				$arr = array('testimonial_user_name' => $this->input->post('user_name'), 'testimonial_user_rating' => $this->input->post('rating'), 'testimonial_user_review' => $this->input->post('user_review'));
				print_r($arr);
			}

			$success_id = $this->blogdb->_insertData('testimonials', $arr);
			if($success_id != null){
				$this->session->set_tempdata('success_msg', 'Testimonial added successfully', 1);
				redirect('home/testimonial');
			}
		}
	}

	function photoupload($img, $imgname, $path)
	{
		$arr = array();
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
}

?>




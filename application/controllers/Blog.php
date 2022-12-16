<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Blog extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();

		$this->load->helper('form');
		$this->load->helper('url');

		$this->load->library('form_validation');


		$this->load->library('upload');
		$this->load->model('blogdb');
	}


	public function index()
	{
		$data['contents'] = $this->blogdb->getblogs();

		// echo "<pre>";
		// print_r($data['contents']);
		// die();

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('blogview', $data);
		$this->load->view('footer');
	}


	public function add_blog()
	{
		if ($this->input->post('submit')) {


			$arr = array('blog_heading' => $this->input->post('blog_title'), 'blog_subheading' => $this->input->post('bolg_subtitle'));
			$id = $this->blogdb->_insertData('blog', $arr);

			// print_r($_POST);die();

			// $config = array(
			// 	'upload_path' => base_url("uploads"),
			// 	'allowed_types' => "gif|jpg|png|jpeg|pdf",
			// 	'overwrite' => TRUE,
			// 	'max_size' => "2048000", // Can be set to particular file size , here it is 2 MB(2048 Kb)
			// 	'max_height' => "768",
			// 	'max_width' => "1024"
			// );
			// $this->load->library('upload', $config);


			$i = 0;

			// foreach($_POST['imgfiles'] as $if)
			// {
			// 	if ($this->upload->do_upload($if)) {
			// 		print_r("Success");
			// 	} else {
			// 		// print_r("image".$_POST['imgfiles'][$i]." not uploaded");
			// 		print_r( $this->upload->display_errors());
			// 	}

			// }
			foreach($_POST['contents'] as $content){
				echo "<pre>";
				print_r($content);
				echo "<br>";
				if(!empty($_FILES['imgfiles']['name'][$i])){

					$_FILES['file']['name'] = $_FILES['imgfiles']['name'][$i];
					$_FILES['file']['type'] = $_FILES['imgfiles']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['imgfiles']['tmp_name'][$i];
					$_FILES['file']['error'] = $_FILES['imgfiles']['error'][$i];
					$_FILES['file']['size'] = $_FILES['imgfiles']['size'][$i];
			
					
	
	
					$prefix = time();
					$image = $prefix . "-" . $_FILES['imgfiles']['name'][$i];
					$imginfo = $this->photoupload($image, "file", "assets/blogimages");
	
					print_r($imginfo);
				}
				

				$i = $i+1;
			}
			die();

			
		
		
			if($imginfo['type'] == 'success') {
				

				$arr1 = array('blog_content_blog_id' => $id, 'blog_content_blog_text' => "".$_POST['contents']."", "blog_img" =>$imginfo['info']['file_name']);

				
				
				$this->blogdb->_insertData('blog_content', $arr1);

				$i = $i + 1;
			}
		// }

			$this->session->set_tempdata('success_msg', 'Blog added successfully', 1);
			redirect('blog');
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
			$arr = array('type'=>'error','info'=>$this->upload->display_errors());
			return $arr;
		} else {
			$arr = array('type'=>'success','info'=>$this->upload->data());
			return $arr;
		}
		/*image upload code end*/
	}
	

	function view_blog($id = null)
	{
		$data['blog'] = $this->blogdb->getblog($id);

		$this->load->view('header');
		$this->load->view('navbar');
		$this->load->view('view_blog',$data);
		$this->load->view('footer');

		// print_r($data['blog']);
	}
}
 
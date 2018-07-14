<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$data=array();
		$this->load->model('Books_model','Book');
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

	$data['book']=$this->Book->get_book();
	$data['title']='Book Store Management';
	$data['main_data']='books/index.php';
	$this->load->view('common', $data);
}

public function view($slug=NULL)
{
//echo "id=".$id;
	$data['book']=$this->Book->get_book($slug);
	$data['main_data']='books/view.php';
	$this->load->view('common', $data);
}

public function delete($id){
	$this->Book->delete_book($id);
	redirect('Books/index');

}

public function edit($id){
	$data['title']='Edit Book Details';
	$data['result']=$this->Book->get_book(True, $id);
	if ($this->input->post()) {
		# code...
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('author', 'Author', 'required');
		if ($this->form_validation->run()==True) {
			$arr=array(
				'title'=>$this->input->post('title'),
				'author'=>$this->input->post('author'),
				'slug'=>url_title($this->input->post('title'), dash, True),

			);
			if ($this->Book->reg($arr,$id)) {
				redirect('Books/index');
				# code...
			}else{
				$data['main_data']='books/edit.php';
	            $this->load->view('common', $data);
			}
			# code...
		}
	}
    
    //var_dump(  $data['result']);exit;
	$data['main_data']='books/edit.php';
	$this->load->view('common', $data);

}


public function create(){
	$data['title']='Add Book Details';

	if ($this->input->is_ajax_request()) {
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('author', 'Author', 'required');
		if ($this->form_validation->run()==True) {
			# code...
		
# code...
		$title=$this->input->post('title');
		$author=$this->input->post('author');
		$reg_data=array(
			'title'=>$title,
			'author'=>$author,
			'slug'=>url_title($title,'dash', True)
		);
		$this->Book->reg($reg_data);
		if($reg_data){
			echo "success"; exit;
		}else{
			echo "invalid username or password"; exit;
		}
	}else{
		redirect('Books/create');
	}
	}

	$data['main_data']='books/add.php';
	$this->load->view('common', $data);

}


}

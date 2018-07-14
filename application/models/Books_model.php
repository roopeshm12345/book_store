<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Books_model extends CI_Model {
	public function __construct(){
		parent::__construct();
	}
	public function get_book($slug=False, $id=0){
		if ($id!== 0) {
			//echo $id;exit;
			return $this->db->get_where('books_tb',array('id'=>$id))->result();
		}
		if($slug===False){
			return $this->db->get('books_tb')->result_array();
		}
		return $this->db->get_where('books_tb', array('slug'=>$slug))->result_array();

		
	}
	public function reg($str, $id=0){
		if ($id!==0) {

			# code...
			$this->db->where('id', $id);


					if ($this->db->update('books_tb', $str)) {
	    return True;
		}else{
		return True;
	}





		}





		if ($this->db->insert('books_tb', $str)) {
	    return True;
		}else{
		return True;
	}

	}
	public function delete_book($id){
		$this->db->where('id', $id);
		return $this->db->delete('books_tb');
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
	
}

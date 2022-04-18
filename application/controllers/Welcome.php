<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$data["root"] = $this->db->query("SELECT * FROM orang WHERE `parent`=0")->result();
		$this->load->view('body',$data);
	}

	function deleteku(){
		$id = $this->input->post("id");
		$this->db->where("id",$id);
		$this->db->delete("orang");
	}

	function addku(){
		
	}

	function loadadd($parent){
		$this->load->view("formadd",["parent"=>$parent]);
	}

	function saveorang(){
		$orang = $this->input->post(NULL);
		$this->db->insert("orang",$orang);
		redirect("welcome");
	}
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

	public function sale(){
		$this->output->enable_profiler(TRUE);
		$data['item']=$this->Mymodel->get('product', 'p_code')->result_array();
		$data['category']=$this->Mymodel->get('category', 'c_id')->result_array();
		$this->load->view('layout/navbar');
		$this->load->view('sale', $data);
		$this->load->view('layout/footer');
	}
	public function do_pick(){
				$id=$this->input->post('id');
				$data=$this->Mymodel->pick_product('product', 'p_code', $id);
				print_r($data);
		}
	public function do_sale(){
		$total=$this->input->post('total');
		$pick_array= json_decode(stripslashes($_POST['pick_array']));
		$date=date('Y-m-d');
		$data=array('date'=>$date, 'sum'=>$total);
		$this->Mymodel->insert('sales', $data);

		$data1=$this->Mymodel->get('sales', 'sale_id')->result_array();
		$result=$data1[0];
		$show=$result['sale_id'];

		foreach ($pick_array as $rows) {
				$data=array('sale_no'=>$show, 'product_id'=>$rows);
				$this->Mymodel->insert('sale_detail', $data);
		}
	}
	public function print_data(){
		$printdata['myid']=$this->Mymodel->get_for_print()->result_array();
		foreach ($printdata['myid'] as $rows) {
			$id=$rows['sale_id'];
		}
		$printdata['pdata']=$this->Mymodel->last_get($id)->result_array();
		$this->load->view('layout/navbar');
		$this->load->view('print', $printdata);
		$this->load->view('layout/footer');
	}
	public function getfore(){
		$data=$this->Mymodel->get_sale_detail('sale_detail', 'sales', 'sale_id', 'sale_no')->result_array();
		print_r($data);
	}
	public function add_category(){
		$this->output->enable_profiler(TRUE);
		$this->load->view('layout/navbar');
		$this->load->view('category');
		$this->load->view('layout/footer');
	}
	public function do_add_category(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$c_name=$this->input->post('name');
			$this->form_validation->set_rules('name', 'set name', 'required|trim|alpha_numeric_spaces|max_length[40]');
			if($this->form_validation->run()==FALSE){
					$this->add_category();
			}else{
				$data=array('c_name'=>$c_name);
				$this->Mymodel->insert('category', $data);
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade in">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    <strong>Success!</strong> This alert box could indicate a successful or positive action.
				  </div>');
				redirect('add_category');
			}
		}else{
			redirect('add_category');
		}
	}
	public function add_product(){
		$data['category']=$this->Mymodel->get('category', 'c_id')->result_array();
		$data['product']=$this->Mymodel->get('product', 'p_code')->result_array();
		$this->load->view('layout/navbar');
		$this->load->view('add_product', $data);
		$this->load->view('layout/footer');
	}//end function
	public function do_add_product(){
		if($_SERVER['REQUEST_METHOD']=='POST'){
			$p_code=$this->input->post('code');
			$p_name=$this->input->post('name');
			$category=$this->input->post('p_category');
			$p_price=$this->input->post('price');
			$this->form_validation->set_rules('code', 'product code', 'required|trim|is_natural|max_length[20]|is_unique[product.p_code]');
			$this->form_validation->set_rules('name', 'product name', 'required|trim|alpha_numeric_spaces|max_length[20]');
			$this->form_validation->set_rules('p_category', 'product category', 'required|trim');
			$this->form_validation->set_rules('price', 'product price', 'required|trim|decimal|max_length[20]');
			if($this->form_validation->run()==FALSE){
					$this->add_product();
			}else{
				$data=array('p_code'=>$p_code, 'p_name'=>$p_name, 'p_price'=>$p_price, 'c_id'=>$category);
				$this->Mymodel->insert('product', $data);
				$this->session->set_flashdata('msg', '<div class="alert alert-success alert-dismissible fade in">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    <strong>Success!</strong> This alert box could indicate a successful or positive action.
				  </div>');
				redirect('add_product');
			}
		}else{
			redirect('add_product');
		}
	}
}//end class
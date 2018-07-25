<?php

class Mymodel extends CI_Model {
	public function insert($table, $data){
		$this->db->insert($table, $data);
		return true;
	}
	public function get($table, $id){
		$this->db->order_by($id, 'DESC');
		$query=$this->db->get($table);
		return $query;
	}
	public function get_product($table, $f_id, $id){
		$this->db->where($f_id, $id);
		$query=$this->db->get($table);
		return $query;
	}
	public function pick_product($table, $f_id, $id){
		$rows=array();
		$this->db->where($f_id, $id);
		$result=$this->db->get($table);
		foreach ($result->result() as $key) {
			$rows[] = $key;
		}
		$json = json_encode($rows);
		return $json;
	}
	public function get_sale_detail($table, $fore_table, $id, $fore_id){
			$query = $this->db->select('*')
                  ->from('sale_detail')
                  ->join('sales', 'sales.sale_id= sale_detail.sale_no')
                  ->get();

			return $query;
	}
	public function get_for_print(){
		$this->db->order_by('s_detail_id', 'DESC');
		$this->db->limit(1);
		$query = $this->db->select('*')
                  ->from('sale_detail')
                  ->join('sales', 'sales.sale_id= sale_detail.sale_no')
                  ->get();
			return $query;
	}
	public function last_get($id){
		$this->db->where('sale_no', $id);
		$query = $this->db->select('*')
                  ->from('sale_detail')
				->join('product', 'product.p_code=sale_detail.product_id')
                  ->get();
			return $query;
	}
}//end class
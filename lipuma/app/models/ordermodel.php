<?php 

	class ordermodel extends DModel{

		public function __construct(){
			parent::__construct();
		}
		public function insert_order($table_order,$data_order){
			return $this->db->insert($table_order,$data_order);
		}
		public function insert_order_details($table_order_details,$data_details){
			return $this->db->insert($table_order_details,$data_details);
		}
		public function list_order($table_order){
			$sql = "SELECT * FROM $table_order ORDER BY order_id DESC";
			return $this->db->select($sql);
		}

		public function list_order_by_time($table_order, $start_date, $end_date){
			$sql = "SELECT * FROM tbl_order 
			WHERE order_date BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'";
			return $this->db->select($sql);
		}

		// public function get_order_price_by_order_code($table_order,$order_code){
		// 	$sql = "SELECT * FROM tbl_order 
		// 	WHERE order_date BETWEEN '$start_date 00:00:00' AND '$end_date 23:59:59'";
		// 	return $this->db->select($sql);
		// }

		public function list_order_details($table_product,$table_order_details,$cond){
			$sql = "SELECT * FROM $table_order_details,$table_product WHERE $cond";
			return $this->db->select($sql);
		}

		public function list_order_details_by_condition($table_order_details,$cond){
			$sql = "SELECT * FROM $table_order_details WHERE $cond";
			return $this->db->select($sql);
		}

		public function list_info($table_order_details,$cond_info){
			$sql = "SELECT * FROM $table_order_details WHERE $cond_info LIMIT 1";
			return $this->db->select($sql);
		}
		public function order_confirm($table_order,$data,$cond){
			return $this->db->update($table_order,$data,$cond);
		}
	}
?>
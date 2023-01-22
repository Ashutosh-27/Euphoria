<?php

class Admindb extends CI_Model{

    function _insertData($table, $data)
	{
		$query = $this->db->insert($table, $data);
		if ($query) {
			return $this->db->insert_id();
		} else {
			return false;
		}
	}

	function _updateData($table, $data, $where)
	{
		$query = $this->db->update($table, $data, $where);
		if ($query) {
			return true;
		} else {
			return false;
		}
    }


	function getadmin($arr){
		$this->db->select('*' );
		$this->db->from('admin');
	    $this->db->where($arr);
		$query = $this->db->get();

		return $query->row();
	}

} 

?>


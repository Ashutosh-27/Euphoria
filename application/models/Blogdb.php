<?php

class BLogdb extends CI_Model{

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


	function getblogs(){
		$this->db->select('blog.* , blog_content.blog_content_id , GROUP_CONCAT(blog_content_blog_text) as content , GROUP_CONCAT(blog_img) as imgs' );
		$this->db->from('blog');
		$this->db->join('blog_content','blog_content.blog_content_blog_id = blog.blog_id','left');

		$this->db->group_by('blog.blog_id'); 
		$this->db->order_by('blog.blog_id', 'asc');
		$query = $this->db->get();

		return $query->result();
	}

	function getblog($id){
		$this->db->select('blog.* , blog_content.blog_content_id , GROUP_CONCAT(blog_content_blog_text SEPARATOR "==>") as content , GROUP_CONCAT(blog_img SEPARATOR "==>") as imgs ' );
		$this->db->from('blog');
		$this->db->join('blog_content','blog_content.blog_content_blog_id = blog.blog_id','left');
		$this->db->group_by('blog.blog_id'); 
		$this->db->order_by('blog.blog_id', 'asc');
		$this->db->where('blog_id',$id);
		$query = $this->db->get();

		return $query->row();
	}
} 

?>

<!-- SELECT col1, col2, ..., colN
GROUP_CONCAT ( [DISTINCT] col_name1 
[ORDER BY clause]  [SEPARATOR str_val] ) 
FROM table_name GROUP BY col_name2; -->

<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class Employee_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
    /*
     * Get komentar by id
     */
    function get_komentar($id)
    {
        return $this->db->get_where('komentar',array('id'=>$id))->row_array();
    }
    
    /*
     * Get all komentar count
     */
    function get_all_komentar_count(){
        $this->db->select('NIK, Name, GroupDesc');
        $this->db->order_by('GroupId', 'desc');

        $keyword = $this->session->userdata('kom_sess_keyword');
        if ($keyword != "") {
            $this->db->like('k.pengirim',$keyword);
            $this->db->or_like('k.komentar',$keyword);
        }
        $this->db->from('new_view');
        
        return $this->db->count_all_results();
    }
        
    /*
     * Get all komentar
     */
    function get_all_komentar($params = array()){
        
        $this->db->select('Nik, Name, GroupDesc');
        $this->db->order_by('GroupId', 'desc');

        if(isset($params) && !empty($params)){
            $this->db->limit($params['limit'], $params['offset']);
        }
        
        $keyword = $this->session->userdata('kom_sess_keyword');
        if ($keyword != "") {
            $this->db->like('k.pengirim',$keyword);
            $this->db->or_like('k.komentar',$keyword);
        }
        
        return $this->db->get('new_view')->result_array();
    }
        
    /*
     * function to add new komentar
     */
    function add_komentar($params)
    {
        $this->db->insert('komentar',$params);
        return $this->db->insert_id();
    }
    
    /*  
     * function to update komentar
     */
    function update_komentar($id,$params)
    {
        $this->db->where('id',$id);
        return $this->db->update('komentar',$params);
    }
    
    /*
     * function to delete komentar
     */
    function delete_komentar($id)
    {
        return $this->db->delete('komentar',array('id'=>$id));
    }
}

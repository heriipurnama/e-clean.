<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class UserBuildingModel extends CI_Model
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
     * function to add new dt_buildings
     */
    function add_dt_buildings( $params )
    {
        $labaLabaValue = $params['SARANG_LABA_LABA'];

        $sql = "INSERT INTO dt_buildings 
                ( AREA_ID, TANGGAL, TIME, LANTAI, SARANG_LABA_LABA, KACA, BESI_UWF, TEMPAT_SAMPAH, CATATAN, CREATED_BY, CREATED_DATE)
                 VALUES ( '$params[AREA_ID]', '$params[TANGGAL]', '$params[TIME]', '$params[LANTAI]', '$labaLabaValue', '$params[KACA]', 
                 '$params[BESI_UWF]', '$params[TEMPAT_SAMPAH]', '$params[CATATAN]', '$params[CREATED_BY]', '$params[CREATED_DATE]')";
     return   $this->db->query($sql);
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
        $this->load->library('session');
        $data =   $this->session->all_userdata();
        $groupId = $data['groupId'];  

        $this->db->select('Nik, Name, GroupDesc, EmployeeID');
        $this->db->where('GroupID', $groupId);
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
     * function to add new spl
     * 
     */

     function add_SPL($params){
        print_r("okDB");
        print_r($params);
     return $this->db->insert('emp0011',$params);
     }

      /*
     * function to add new spl detail
     * 
     */

    function add_Detail_SPL($params){
        print_r("okDB add_Detail_SPL");
        print_r($params);
    return $this->db->insert('emp0012',$params);
    }

    /*
     * Get all SPL
     */
    function get_all_spl($params = array()){
        $this->load->library('session');
        $data =   $this->session->all_userdata();
        $username = $data['nik'];  

        $this->db->select('*');
        $this->db->where('created_by', $username);
        $this->db->order_by('SPLID', 'desc');

        if(isset($params) && !empty($params)){
            $this->db->limit($params['limit'], $params['offset']);
        }
        
        $keyword = $this->session->userdata('kom_sess_keyword');
        if ($keyword != "") {
            $this->db->like('k.pengirim',$keyword);
            $this->db->or_like('k.komentar',$keyword);
        }
        
        return $this->db->get('emp0011')->result_array();
    }
    
    /*
     * Get all spl count
     */
    function get_all_spl_count(){
        $this->load->library('session');
        $data =   $this->session->all_userdata();
        $username = $data['nik'];  

        $this->db->select('*');
        $this->db->where('created_by', $username);
        $this->db->order_by('SPLID', 'desc');

        $keyword = $this->session->userdata('kom_sess_keyword');
        if ($keyword != "") {
            $this->db->like('k.pengirim',$keyword);
            $this->db->or_like('k.komentar',$keyword);
        }
        $this->db->from('emp0011');
        
        return $this->db->count_all_results();
    }

     /*
     * Get Group Desc
     */
    function get_group_desc($params){
        $this->load->library('session');
        $data =   $this->session->all_userdata();
        $groupId = $data['groupId'];  

        $this->db->select('Nik, Name, GroupDesc, EmployeeID');
        $this->db->where('GroupID', $groupId);
        $this->db->order_by('GroupId', 'desc');
        
        return $this->db->get('new_view')->result_array();
    }

    /*
     * Get SPL by id
     */
    function get_spl($id)
    {
        return $this->db->get_where('emp0011',array('SPLID'=>$id))->row_array();
    }

    /*
     * function to update emp0011 SPL
     */
    function update_spl($id,$params)
    {
        $this->db->where('SPLID',$id);
        return $this->db->update('emp0011',$params);
    }

    /*
     * function list employee SPL
     */
    function getEmployeeSPL($id){
        $this->db->select('emp0012.SPLID, emp0003.EmployeeID ,emp0003.NIK, emp0003.Name, emp0003.DepartmentID 
        GroupDesc');
        $this->db->from('emp0003');
        $this->db->join('emp0012','emp0003.EmployeeID=emp0012.EmployeeID');
        $this->db->where('emp0012.SPLID',$id);
        $query=$this->db->get();
      return  $data= $query->result_array();
    }
    
    /*
     * Get emp0012 by splId and employeeID
     */
    function getSPLDetail($splid, $employeeId)
    {
        return $this->db->get_where('emp0012', array('SPLID'=>$splid,'EmployeeID'=>$employeeId))->row_array();
    }

     /*
     * function emp0012 by splId and employeeID
     */
    function deleteEmployeSPLID($splid, $employeeId)
    {
        return $this->db->delete('emp0012', array('SPLID'=>$splid,'EmployeeID'=>$employeeId));
    }
}
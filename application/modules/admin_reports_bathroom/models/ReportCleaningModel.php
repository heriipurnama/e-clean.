<?php
/* 
 * Generated by CRUDigniter v3.2 
 * www.crudigniter.com
 */
 
class ReportCleaningModel extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }
    
   
    
    /*
     * Get all SPL count report
     */
    function getAllReportingCount(){
       // ini_set('memory_limit', '-1');
       $data =   $this->session->all_userdata();
       $username = $data['nik'];  

        $sql = " SELECT dt_bathrooms.BATHROOMS_ID ,dt_areas.NAME, dt_bathrooms.TANGGAL, dt_bathrooms.TIME, dt_bathrooms.TOILET, dt_bathrooms.SABUN, dt_bathrooms.LANTAI, dt_bathrooms.DINDING,dt_bathrooms.AROMA,
        dt_bathrooms.KAIN, dt_bathrooms.PINTU, dt_bathrooms.KRAN, dt_bathrooms.TEMPAT_SAMPAH,
        dt_bathrooms.CATATAN, dt_bathrooms.CREATED_BY, dt_bathrooms.CREATED_DATE
        FROM dt_bathrooms JOIN dt_areas ON dt_bathrooms.AREA_ID = dt_areas.AREA_ID ";

        $query = $this->db->query($sql);

        return $query->num_rows();
    }
        
    /*
     * Get all SPL report
     */
    function getAllDataCleaning ( $params = array() ){
       // ini_set('memory_limit', '-1');
        $this->load->library('session');
        $data =   $this->session->all_userdata();
        $username = $data['nik'];  

        if(isset($params) && !empty($params)){
            $this->db->limit($params['limit'], $params['offset']);
        }
        
        $sql = " SELECT dt_bathrooms.BATHROOMS_ID ,dt_areas.NAME, dt_bathrooms.TANGGAL, dt_bathrooms.TIME, dt_bathrooms.TOILET, dt_bathrooms.SABUN, dt_bathrooms.LANTAI, dt_bathrooms.DINDING,dt_bathrooms.AROMA,
        dt_bathrooms.KAIN, dt_bathrooms.PINTU, dt_bathrooms.KRAN, dt_bathrooms.TEMPAT_SAMPAH,
        dt_bathrooms.CATATAN, dt_bathrooms.CREATED_BY, dt_bathrooms.CREATED_DATE
        FROM dt_bathrooms JOIN dt_areas ON dt_bathrooms.AREA_ID = dt_areas.AREA_ID
        ORDER BY dt_bathrooms.CREATED_DATE DESC ";

        $query = $this->db->query($sql);

        return $query->result_array();

    }

     /*
     * Get search  SPL count report
     */
    function getSearchAllSPLcount( $startDate, $endDate, $areaId ){
        // ini_set('memory_limit', '-1');
        $data =   $this->session->all_userdata();
        $username = $data['nik'];  
       
        $sql = " SELECT  dt_bathrooms.BATHROOMS_ID ,dt_areas.AREA_ID,dt_areas.NAME,dt_areas.TYPE, dt_bathrooms.TANGGAL, dt_bathrooms.TIME, dt_bathrooms.TOILET, dt_bathrooms.SABUN, dt_bathrooms.LANTAI, dt_bathrooms.DINDING,dt_bathrooms.AROMA,
        dt_bathrooms.KAIN, dt_bathrooms.PINTU, dt_bathrooms.KRAN, dt_bathrooms.TEMPAT_SAMPAH,
        dt_bathrooms.CATATAN, dt_bathrooms.CREATED_BY, dt_bathrooms.CREATED_DATE
        FROM dt_bathrooms JOIN dt_areas ON dt_bathrooms.AREA_ID = dt_areas.AREA_ID
        WHERE dt_areas.AREA_ID='$areaId' 
        AND dt_bathrooms.TANGGAL BETWEEN '$startDate' AND '$endDate' 
        ORDER BY dt_bathrooms.CREATED_DATE DESC ";

        $query = $this->db->query($sql);

        return $query->num_rows();
     }

    /*
     * Get search SPL report
     */
    function getSearchAllSPL( $params = array(), $startDate, $endDate, $areaId ){
   
        $this->load->library('session');
 
        $data =   $this->session->all_userdata();
        $username = $data['nik'];  
 
        if(isset($params) && !empty($params)){
            $this->db->limit($params['limit'], $params['offset']);
       }
        
       $sql = " SELECT  dt_bathrooms.BATHROOMS_ID ,dt_areas.AREA_ID,dt_areas.NAME,dt_areas.TYPE, dt_bathrooms.TANGGAL, dt_bathrooms.TIME, dt_bathrooms.TOILET, dt_bathrooms.SABUN, dt_bathrooms.LANTAI, dt_bathrooms.DINDING,dt_bathrooms.AROMA,
       dt_bathrooms.KAIN, dt_bathrooms.PINTU, dt_bathrooms.KRAN, dt_bathrooms.TEMPAT_SAMPAH,
       dt_bathrooms.CATATAN, dt_bathrooms.CREATED_BY, dt_bathrooms.CREATED_DATE
       FROM dt_bathrooms JOIN dt_areas ON dt_bathrooms.AREA_ID = dt_areas.AREA_ID
       WHERE dt_areas.AREA_ID='$areaId' 
       AND dt_bathrooms.TANGGAL BETWEEN '$startDate' AND '$endDate' 
       ORDER BY dt_bathrooms.CREATED_DATE DESC ";

     

        $query = $this->db->query($sql);

        return $query->result_array();
    }
         
}
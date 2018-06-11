<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends CI_Model {
    
    public function getDataList(&$aDataList)
    {
        $bigquery = $this->db->get('p_index_data');
        $aDataList = $bigquery->result_array();
                      
    }
    
    
}
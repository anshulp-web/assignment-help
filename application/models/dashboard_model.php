<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

// For data insertion 
public function insert_data($table,$data){
$sql = $this->db->insert($table,$data);

if ($sql) {
    return true;
}else{
    return false;
}
}
    
//Fetch Data form database
public function select_data($data,$table,$where){
$sql = $this->db->select($data)
                ->from($table)
                ->where($where)
                ->get();

        if ($sql) {
            return  $sql->result_array();
        } else {
            return false;
        }

}


//Delete data from database

public function delete_data($where,$table){
    $sql = $this->db->where($where)
                    ->delete($table);

                    if ($sql) {
                        return  true;
                    } else {
                        return false;
                    }               
}

//Update data from database

public function update_data($table,$data,$where){
$sql = $this->db->update($table,$data,$where);
return $sql;
}
}
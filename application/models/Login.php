<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Model {

    public function Login_validate($user_name,$pass){
       $sql = $this->db->select('user_name,row_id,password')
                 ->where(['user_name'=>$user_name,'password'=>$pass])
                 ->get('admin_details');

                 if ($sql) {
                    return $sql->result_array();
                 }else{
                     return false;
                 }
    }
}

?>
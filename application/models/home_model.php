<?php
class Home_model extends CI_Model 
{ 
   public function saveRecordOne($name,$pass,$email){
       $this->db->query("insert into userinfo values('','.$name.','.$pass.','.$email.')");
       $que=$this->db->query("select * from userinfo where email='".$email."' and username='".$name."' and password='".$pass."'");
       $row = $que->num_rows();
       if($row){
           return TRUE;
       }else{
           return FALSE;
       }
   }
} 

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

?>
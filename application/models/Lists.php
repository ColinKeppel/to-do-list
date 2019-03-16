<?php
 class Lists extends CI_Model {

     public function insert($data)
     {
         $this->db->insert('Lists', $data);
     }
     public function getLists()
     {
         $dbdata = array();
         $this->db->from('Lists');
         $this->db->select('*');
         $query = $this->db->get();
         if ($query->num_rows()) {
             foreach ($query->result_array() as $row) {
                 $dbdata[] = array(
                     'list_id' => $row['list_id'],
                     'list_name' => $row['list_name'],
                     'list_status' => $row['list_status']
                 );
             }
         }
         return $dbdata;
     }
 }
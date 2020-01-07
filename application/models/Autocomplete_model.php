<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Autocomplete_model extends CI_Model
{
    function fetch_data($query)
    {
        $this->db->like('nama', $query);
        $query = $this->db->get('siswa');
        
        if($query->num_rows() > 0)
        {
            foreach($query->result_array() as $row)
            {
                $output[] = array(
                    'nama'  => $row["nama"]
                );
            }
            echo json_encode($output);
        }
    }
}

?>
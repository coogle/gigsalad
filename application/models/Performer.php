<?php

class Performer extends CI_Model
{
    public function getRange($start = 0, $length = 4)
    {
        $query = $this->db->get('performers', $length, $start);
        
        $results = $query->result();
        
        foreach($results as $key => $result) {
            $results[$key]->thumbnail = json_decode($result->thumbnail, true);
        }

        return $results;
    }
}
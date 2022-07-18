<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class feed_model extends CI_model
{

    // get all
    function get_feeds()
    {
        $query = $this->db->get('posts');
        if ($query->numRows() > 0) { // check for rows
            return $query->result();
        }
        return;
    }
}

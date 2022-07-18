<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Posts_model extends CI_Model
{
    public function getPosts($limit = null)
    {
        return $this->db->get('posts', $limit);
    }
}

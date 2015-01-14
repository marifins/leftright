<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class Main_model extends CI_Model {
    /* var $no_reg = '';
      var $nama = '';
      var $jabatan = '';
      var $gol = '';
      var $bagian = '';
      var $kebun_unit = ''; */

    function __construct() {
        // Call the Model constructor
        parent::__construct();
    }

    function get_category() {
        $query = $this->db->query('SELECT * FROM category');
        return $query->result();
    }

    function get_album($id_category) {
        $query = $this->db->query('SELECT * FROM album WHERE id_category="' . $id_category . '"');
        return $query->result();
    }

    function get_image($id_album) {
        $query = $this->db->query('SELECT * FROM images WHERE id_album="' . $id_album . '"');
        return $query->result();
    }
    
    function get_category_id($link) {
        $query = $this->db->query('SELECT * FROM category WHERE link="' . $link . '"');
        return $query->row();
    }

}

?>

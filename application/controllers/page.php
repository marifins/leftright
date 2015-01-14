<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/**
 *
 *
 * @copyright 2010
 * @author Muhammad Arifin Siregar
 * @package default_template
 * @modified Sep 2, 2010
 */
class Page extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('main_model');
        $this->load->helper('url');
        $this->load->library('auth');
    }

    public function index($page = 0) {

        $this->load->library('parser');

        //$d['query'] = $this->produksi_model->getAll($tahun, $bulan);
        $d['page'] = $page;
        $data = array(
            'title' => 'LeftRight Photography',
            'judul' => 'LeftRight',
            'content' => $this->load->view('home', $d, TRUE)
        );
        $this->parser->parse('template', $data);
    }

    public function i() {
        $data = array(
            'title' => 'LeftRight Photography',
            'judul' => 'LeftRight',
        );
        $d = "";
        $this->load->view('home', $d);
    }

}

?>

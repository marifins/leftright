<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$config = array(
    'user' => array(
        array(
            'field' => 'register',
            'label' => 'No. Register',
            'rules' => 'required'
        ),
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required'
        ),
        array(
            'field' => 'nama_lengkap',
            'label' => 'Nama Lengkap',
            'rules' => 'required'
        ),
        array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'required'
        ),
        array(
            'field' => 'repassword',
            'label' => 'Re-Password',
            'rules' => 'required'
        ),
        array(
            'field' => 'privilege',
            'label' => 'Privilage',
            'rules' => 'required'
        )
    ),
    'user2' => array(
        array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'required'
        ),
        array(
            'field' => 'nama_lengkap',
            'label' => 'Nama Lengkap',
            'rules' => 'required'
        ),
        array(
            'field' => 'privilege',
            'label' => 'Privilage',
            'rules' => 'required'
        )
    ),
    'new_record' => array(
        array(
            'field' => 'kebun',
            'label' => 'Kebun',
            'rules' => 'required'
        ),
        array(
            'field' => 'realisasi',
            'label' => 'Realisasi',
            'rules' => 'required'
        ),
        array(
            'field' => 'tanggal',
            'label' => 'Tanggal',
            'rules' => 'required'
        )
    )
);
?>

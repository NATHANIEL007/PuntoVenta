<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller
{
  public function index()
  {
    $this->load->view('header');
    $data['hola']="Hola mundo";
    $this->load->view('main', $data);
    $this->load->view('footer');
  }
}

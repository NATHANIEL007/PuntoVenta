<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller
{
  public function index()
  {
    $this->load->view('header');
    $this->load->view('barra');
    $data['hola']="Hola mundo";
    $this->load->view('navegacion');
    $this->load->view('main', $data);
    $this->load->view('footer');
  }
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;
require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Api extends REST_Controller {
    function __construct($config = 'rest'){
        parent::__construct($config);
    }

    public function index_get()
    {
        echo "GET_request";
    }

    public function index_post()
    {
        echo "POST_request";
    }

    public function index_put()
    {
        echo "PUT_request";
    }

    public function index_patch()
    {
        echo "PATCH_request";
    }

    public function index_delete()
    {
        echo "DELETE_request";
    }

}

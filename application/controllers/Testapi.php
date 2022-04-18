<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Testapi extends RestController {

    function __construct()
    {
        // Construct the parent class
        parent::__construct();
    }

    public function users_get()
    {
        $data = $this->get("id");
        $this->response([
            "status" => true,
            "status" => "Berhasil ".$data
        ],200);
    }
}
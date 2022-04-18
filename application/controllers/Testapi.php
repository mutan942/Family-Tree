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
        $root = $this->db->query("SELECT * FROM orang WHERE `parent`=0")->result_array();
        $ggg = [];
        $group = $this->db->query("SELECT * FROM orang WHERE `parent` != 0 GROUP BY `parent`")->result_array();
        foreach($group as $g){
            $people = $this->db->get_where("orang",["parent"=>$g['parent']])->result_array();
            $ggg[$g['parent']] = $people;
        }
        $data = $this->get("id");
        $this->response([
            "status" => true,
            "root" => $root,
            "child" => $ggg
        ],200);
    }
}
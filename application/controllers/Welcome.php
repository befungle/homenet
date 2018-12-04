<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
    public $input_data;

    public function __construct()
    {
        header('Access-Control-Allow-Origin: *');
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
        parent::__construct();
        $this->input_data = $this->input->post();
    }



	public function index()
	{
        $this->db->select('*');
        //$this->db->where(array('device' => "garage"));
        $query = $this->db->get('devices');
        $record = $query->result_array();
        foreach($record as $key=>$value){
            $rgb = array($record[$key]["r"],$record[0]["g"],$record[0]["b"]);
            $record[$key]["HEX"] = $this->rgb2hex($rgb);
        }
        $data = array('devices'=>$record);
        $this->load->view('home',$data);
	}

	public function getDevice($device){
        $this->db->select('act,r1,r2,r,g,b,d,s');
        $this->db->where(array('device' => $device));
        $query = $this->db->get('devices');
        $record = $query->result_array();
        //print_r($record);
        foreach($record[0] as $value){
            echo $value." ";
        }
    }

    public function putDeviceColor(){
        //print_r($this->input->post());
        $this->db->set($this->input->post());
        $this->db->where('did', $this->input->post()["did"]);
        $this->db->update('devices');
    }

    public function putDeviceAni(){

    }

	public function garage(){


    }


    public function dispcase1(){
        $this->db->select('*');
        $this->db->where(array('device' => "dispcase1"));
        $query = $this->db->get('devices');
        $record = $query->result_array();
        //print_r($record);
        echo $record[0]["action"]." ".$record[0]["red"]." ".$record[0]["green"]." ".$record[0]["blue"];

    }
    public function dispcase2(){
        $this->db->select('*');
        $this->db->where(array('device' => "dispcase2"));
        $query = $this->db->get('devices');
        $record = $query->result_array();
        //print_r($record);
        echo $record[0]["action"]." ".$record[0]["red"]." ".$record[0]["green"]." ".$record[0]["blue"];

    }

    public function oillamp(){
        $this->db->select('*');
        $this->db->where(array('device' => "oillamp"));
        $query = $this->db->get('devices');
        $record = $query->result_array();
        //print_r($record);
        echo $record[0]["action"]." ".$record[0]["red"]." ".$record[0]["green"]." ".$record[0]["blue"]." ".$record[0]["speed"];

    }
    public function garagewrite($action,$red,$green,$blue){
        $data = array(
            'did' => '1',
            'device'  => 'garage',
            'action' => $action,
            'red'  => $red,
            'green' => $green,
            'blue' => $blue
        );
        $this->db->replace('devices', $data);

    }
    public function dispcase1write($action,$red,$green,$blue){
        $data = array(
            'did' => '3',
            'device'  => 'dispcase1',
            'action' => $action,
            'red'  => $red,
            'green' => $green,
            'blue' => $blue
        );
        $this->db->replace('devices', $data);

    }
    public function dispcase2write($action,$red,$green,$blue){
        $data = array(
            'did' => '4',
            'device'  => 'dispcase2',
            'action' => $action,
            'red'  => $red,
            'green' => $green,
            'blue' => $blue
        );
        $this->db->replace('devices', $data);

    }
    public function oillampwrite($action,$red,$green,$blue){
        $data = array(
            'did' => '2',
            'device'  => 'oillamp',
            'action' => $action,
            'red'  => $red,
            'green' => $green,
            'blue' => $blue
        );
        $this->db->replace('devices', $data);

    }
    public function json_test(){
	    echo "{
  \"sensor\": \"gps\",
  \"time\": 1351824120,
  \"data\": [
    48.75608,
    2.302038
  ]
}";
    }
    public function rgb2hex($rgb) {
        $hex = "";
        $hex .= str_pad(dechex($rgb[0]), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($rgb[1]), 2, "0", STR_PAD_LEFT);
        $hex .= str_pad(dechex($rgb[2]), 2, "0", STR_PAD_LEFT);

        return $hex; // returns the hex value including the number sign (#)
    }

}

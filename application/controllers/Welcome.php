<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->db->select('*');
        $this->db->where(array('device' => "garage"));
        $query = $this->db->get('devices');
        $record = $query->result_array();
        $rgb = array($record[0]["red"],$record[0]["green"],$record[0]["blue"]);
        $record[0]["HEX"] = $this->rgb2hex($rgb);

        $this->db->select('*');
        $this->db->where(array('device' => "oillamp"));
        $query = $this->db->get('devices');
        $record2 = $query->result_array();
        $rgb = array($record2[0]["red"],$record2[0]["green"],$record2[0]["blue"]);
        $record2[0]["HEX"] = $this->rgb2hex($rgb);

        $this->db->select('*');
        $this->db->where(array('device' => "dispcase1"));
        $query = $this->db->get('devices');
        $record3 = $query->result_array();
        $rgb = array($record3[0]["red"],$record3[0]["green"],$record3[0]["blue"]);
        $record3[0]["HEX"] = $this->rgb2hex($rgb);

        $this->db->select('*');
        $this->db->where(array('device' => "dispcase2"));
        $query = $this->db->get('devices');
        $record4 = $query->result_array();
        $rgb = array($record4[0]["red"],$record4[0]["green"],$record4[0]["blue"]);
        $record4[0]["HEX"] = $this->rgb2hex($rgb);

        $data = array('garage'=>$record[0],'oillamp'=>$record2[0],'dispcase1'=>$record3[0],'dispcase2'=>$record4[0]);
		$this->load->view('home',$data);
	}

	public function getDevice($device){
        $this->db->select('action,red,blue,green,speed');
        $this->db->where(array('device' => $device));
        $query = $this->db->get('devices');
        $record = $query->result_array();
        $object = json_encode($record[0]);
        //$object = addslashes($object);
        echo $object;
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

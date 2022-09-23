<?php

include_once './vendor/autoload.php';
include_once '../repository/Donor_repository.php';
class Message{
   private $status;
   private $table='sms_status';
   private $db_conn;

   public function __construct($db){
    $this-> db_conn = $db;
}

public function send($blood_group){

$sid = 'ACe6edc25556d8dfa41c719bf62c86fdaf';
$token = '156adc992b653c0002e240552deba0af';
$client = new Twilio\Rest\Client($sid,$token);
$donor=new DonorRepository($this->db_conn);
$donors=$donor->get_by_blood_group($blood_group);
foreach ($donors as $donor_item) {
    $donor_id=$donor_item['donor_id'];
    $no=$donor_item['phone_number'];
    $firstname=$donor_item['first_name'];
    $lastname=$donor_item['last_name'];
    $msg="Dear $firstname $lastname we'd love you to donate again to help maintain stocks of your blood group";
    if ($donor->verify_donor($donor_id)) {
        
            $message = $client->messages->create(
                $no, array('from'=>'KTCH',
                'body'=>$msg)
            );
           // $this->set_status('false');
        
    }
}





} 

 }
?>
 


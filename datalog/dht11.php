<?php
class dht11{
 public $link='';
 function __construct($temperature, $humidity, $soiltemp, $soilmoisturepercent){
  $this->connect();
  $this->storeInDB($temperature, $humidity, $soiltemp, $soilmoisturepercent);
 }
 
 function connect(){
  $this->link = mysqli_connect('localhost','root','') or die('Cannot connect to the DB');
  mysqli_select_db($this->link,'db1') or die('Cannot select the DB');
 }
 
 function storeInDB($temperature, $humidity,$soiltemp,$soilmoisturepercent){
  $query = "insert into dht11 set humidity='".$humidity."', temperature='".$temperature."', soiltemp='".$soiltemp."', soilmoisturepercent='".$soilmoisturepercent."'";
  $result = mysqli_query($this->link,$query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['temperature'] != '' and  $_GET['humidity'] != ''  and  $_GET['soiltemp'] !=''  and  $_GET['soilmoisturepercent'] !=''){
 $dht11=new dht11($_GET['temperature'],$_GET['humidity'],$_GET['soiltemp'],$_GET['soilmoisturepercent']);
}
?>

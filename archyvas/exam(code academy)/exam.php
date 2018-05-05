<?php
//task 4
  $var = 16;
  $var2 = 25;
  $result = (sqrt($var) + sqrt($var2))/2;

echo $result ."<br>";

//task 5
$a=array("marke"=>"ford","pagaminimo metai"=>"2000","spalva"=>"raudona","galia"=>"100kw");

echo $a["marke"]."<br>";

//task 6
function sum($a, $b, $c) {
    return $a+$b+$c;
}

echo sum("1","1","1")."<br>";

//task 7
$colors=array("red", "purple", "white", "blue", "black");
  foreach($colors as $color) {
    $converted=strtoupper($color."<br>");
      echo $converted;
  }


//task 8
 class Person {
   public $name;
   public $surname;
   public $age;
    function __construct($name, $surname, $age) {
      echo "$name $surname $age";

  }
    function asmensDuomenys($name, $surname, $age){
      echo "$name $surname $age";
    }

 }
$obj= new Person("mikalojus","bogdanas",29 ."<br>");


//task 9
class Staff extends Person {
    function asmensDuomenys($name, $surname,$age){
      echo "$surname $name  ".",darbuotojas <br>";
    }
}
$obj1= new Staff("mikalojus","bogdanas",29 ."<br>");
$obj1->asmensDuomenys("pavardenis", "vardenis",29);
class Client extends Person {


}
$obj2= new Staff("mikalojus","bogdanas",29 ."<br>");

//task 10
class NumberList {
  public $numbers=array();

    function add($number){
      array_push($this->numbers, $number);
    }
    function average(){
      $sum=array_sum($this->numbers);
      $average=$sum/count($this->numbers);
      echo "$average";
    }
}
$obj3=new NumberList();
$obj3->add(3);
$obj3->add(5);
$obj3->average();


//task 11
echo "
<form action='11task.php' method='post'>
  <input type='text' name='company_name' placeholder='company name' /><br>
  <input type='text' name='company_code' placeholder='company code' /><br>
  <input type='radio' name='status' value='gold' checked > Gold<br>
  <input type='radio' name='status' value='silver' > Silver<br>
  <input type='radio' name='status' value='bronze' > Bronze<br>

  <input type='submit' value='Send' />
</form>
";







//task12
$con = mysqli_connect("localhost","root","","imones");
$sel = "Select * from imones ORDER by kliento_registravimo_data DESC LIMIT 5";
$query = mysqli_query($con, $sel);
$rows = mysqli_num_rows($query);

echo $rows;


?>









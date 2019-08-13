<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Php tut</title>
</head>
<body>

<?php
echo("<h1>welcome to php tutorial</h1><br>");

$number = 2;
$str = 'true';
const Name = "chinedu";  //constant declaration
//define('name',"chinedu");

// if(gettype($str)===string){
//   echo `$str is a string`;
// }

define('SITE_URL','localhost:3000/index.php');  //constant declaration;
$names = array(2,'ken',true,3.55);

echo gettype($str).'<br>'; // getting the datatype of a variable;
echo gettype($number).'<br>';
echo Name.'<br>';
echo SITE_URL.'<br>';
echo $names[0].'<br>';

$myname = "chinedu";

//var_dump($names).'<br>';

$link = mysql_connect("localhost",'root','');
//var_dump($link);

//$file = fopen('text.txt','w');
//var_dump($file);
echo strlen("welcome $myname").'<br>';  // checking the length of a string
echo "<h1>".str_word_count('chinedu is learning php in a bit')."</h1><br>"; //check the number of words in a string

$strRep = "chinedu good morning ";

$rep = str_replace('chinedu',"profchiso",$strRep); // replace a word in a string
echo $rep ."<br>";

$ken = "kenchinedu";
echo strrev($ken);  //reverse string

print_r(str_split($ken,4)); // convert string to array;

for($start= 20; $start>=5; $start--){
  if($start%2!==0){
    
    echo $start."<br>";
    if($start==15){
      break;
    }
  }
}
$date = Date('D');
echo ($date==='Sun')? "its sun" :"not sun"."<br>";

$arr = array(array(1,2),array(3,5),"chinedu",true);

//var_dump($arr);

$arrSort = array(3,5,2,1,8,0,4,7); 
sort($arrSort);
rsort($arrSort); //sort in desending order;
print_r($arrSort)."<br>";

//while loop demo;
$whileLoop = 0;
while($whileLoop<10){
 // echo $whileLoop."<br>";
  $whileLoop++;
}

//do while demo
$doLoop= 10;
do{
  //echo $doLoop;
  $doLoop--;
}while($doLoop>0);


//foreach loop demo
$color = array("blue","red","green");
foreach($color as $colorValue){
  echo $colorValue;
}

//base converstions
$decToBin =10;
echo decbin($decToBin)."<br>";

$num = 10;
echo base_convert($num,10,16)."<br>";

//working with date;

$dateTry = date("D d,m/Y h:i:A");
echo $dateTry;

echo date("F d, Y h:i:s A")."<br>";

$time = 1394003958;

echo date($time)."<br>";


$timestamp = time();
echo($timestamp)."<br>";


// file manipulation;

$text = "text.txt";
if(file_exists($text)){
  //echo "file  exist";

  $open = fopen($text,"r") or die("error opening file");
  
  $content= fread($open,filesize($text));
 
  //echo $content."<br>";

   readfile($text)."<br>";
  //echo  strlen($content);
  fclose($open);
}else{
  //echo " no such files";
}

//rename($file, "newfile.txt"); //renaming file;
//unlink($filename); // deleting file;

// making directory;
$dirName = "assets";

if(!file_exists($dirName)){
  if(mkdir($dirName)){
    echo "the $dirName was created"."<br>";
  }
}else{
  echo "$dirName already exist"."<br>";
}

 session_start();
 $_SESSION['name'] ="chinedu";

 echo " $_SESSION[name]";

 //trying mail function

 $to ="okoriechinedusunday@gmail.com";
 $subject="trying  inbuilt mail function of php";
 $msg ="welcome chinedu";
 $from = "chinedusundayokorie@gmail.com";
 if(mail($to,$subject,$msg,$from)){
   echo "mail sent";

 }else{
   echo "something went wrong";
 }

 $myName = "chin  3212edu";
 $valid = filter_var(trim($myName),FILTER_SANITIZE_STRING);
 echo $valid."<br>";
/// json manipulation
 $myArr = array("chinedu",1,true,);
 $json = json_encode($myArr);
 echo $json."<br>";

 $myObj = array("name"=>"chinedu", "age"=> 25, "isSingle"=>true);
 $jsonObj = json_encode($myObj);

 echo $jsonObj."<br>";
 $jsonObject ='{"name":"chinedu","age":25,"isSingle":true}';

var_dump( json_decode($jsonObject))."<br>";

// regular expression
$reg ="oki";
$regExp = "/[chi]/";
if(preg_match($regExp,$reg)){
  echo "match"."<br>";
}else{
  echo "no match"."<br>";
}

// db connections using mysqli and PDO;

//$connect = mysqli_connect("localhost","root","","phptutdb");
// try{
//   $pdo = new PDO("mysql:host=localhost; dbname=phptutdb","root",""); // connecting to db;
//   $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO:: ERRMODE_EXCEPTION); //setting the error mode to exception;
//   echo "connected";


// }catch(PDOException $err){
//   die("Error: ". $err->getMessage());
// }

// unset($pdo);

require_once('dbcon.php');

try{
  $sql ="USE pdodb";
  $pdo->exec($sql);
  echo "dataBASE created successfully"."<br>";

}catch(PDOException $err){
  die("Error". $err->getMessage());
}   
// create table with pdo
//  try{
//    $sql = " CREATE TABLE users(
//      id int(20) NOT NULL PRIMARY KEY AUTO_INCREMENT,
//      fullname VARCHAR(30) NOT Null,
//      email VARCHAR(30) NOT NULL UNIQUE
//    )";
//    $pdo->exec($sql);
//    echo "Table created";

//  }catch(PDOException $err){
//    die("errpr :" .$err->getMessage());
//  }

try{
  $sql = "INSERT INTO users(fullname,email)VALUES('okorie chinedu','okorie@gmail.com')";
  $pdo->exec($sql);
  echo "record inserted"."<br>";
}catch(PDOException $err){
  die("ERROR: " .$err->getMessage());
}

// inserting from form
//Attempt insert query execution
        // try{
        //     // Create prepared statement
        //     $sql = "INSERT INTO persons (first_name, last_name, email) VALUES (:first_name, :last_name, :email)";
        //     $stmt = $pdo->prepare($sql);
            
        //     // Bind parameters to statement
        //     $stmt->bindParam(':first_name', $_REQUEST['first_name']);
        //     $stmt->bindParam(':last_name', $_REQUEST['last_name']);
        //     $stmt->bindParam(':email', $_REQUEST['email']);
            
        //     // Execute the prepared statement
        //     $stmt->execute();
        //     echo "Records inserted successfully.";
        // } catch(PDOException $e){
        //     die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        // }


//select query
        //         // Attempt select query execution
        // try{
        //   $sql = "SELECT * FROM persons";   
        //   $result = $pdo->query($sql);
        //   if($result->rowCount() > 0){
        //       echo "<table>";
        //           echo "<tr>";
        //               echo "<th>id</th>";
        //               echo "<th>first_name</th>";
        //               echo "<th>last_name</th>";
        //               echo "<th>email</th>";
        //           echo "</tr>";
        //       while($row = $result->fetch()){
        //           echo "<tr>";
        //               echo "<td>" . $row['id'] . "</td>";
        //               echo "<td>" . $row['first_name'] . "</td>";
        //               echo "<td>" . $row['last_name'] . "</td>";
        //               echo "<td>" . $row['email'] . "</td>";
        //           echo "</tr>";
        //       }
        //       echo "</table>";
        //       // Free result set
        //       unset($result);
        //   } else{
        //       echo "No records matching your query were found.";
        //   }
        // } catch(PDOException $e){
        //   die("ERROR: Could not able to execute $sql. " . $e->getMessage());
        // }


unset($pdo);
?>
  
</body>
</html>


<?php
$qst =$_POST['qst'];
$code =$_POST['code'];
$opt1 =$_POST['opt1']; 
$opt2 =$_POST['opt2']; 
$opt3 =$_POST['opt3']; 
$opt4 =$_POST['opt4']; 
$crtopt =$_POST['crtopt']; 

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed :' .$conn->conect_error);
}
    else{
        $stmt = $conn->prepare("insert into entry_1(qst, code, opt1, opt2, opt3, opt4, crtopt) value(?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssss",$qst,$code,$opt1,$opt2,$opt3,$opt4,$crtopt);
        $stmt->execute();
        echo "registration sucessfull";
        $stmt->close();
        $stmt->close();
    }
?>
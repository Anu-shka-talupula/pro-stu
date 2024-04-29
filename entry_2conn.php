<?php
$qst =$_POST['qst'];
$code =$_POST['code'];
$answer =$_POST['answer']; 
 

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed :' .$conn->conect_error);
}
    else{
        $stmt = $conn->prepare("insert into entry_2(qst, code, answer) value(?, ?, ?)");
        $stmt->bind_param("sss",$qst,$code,$answer);
        $stmt->execute();
        echo "registration sucessfull";
        $stmt->close();
        $stmt->close();
    }
?>
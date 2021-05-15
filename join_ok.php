<?php
	include_once "./db/db_con.php";
    $id   = $_POST['id'];
    $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT); // 보안을 위해 입력된 PASSWORD를 해쉬값으로 암호화.
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email  = $_POST['email'];
 
    mq("insert into user(id,pass,name,gender,phone,email) values('".$id."','".$pass."','".$name."','".$gender."','".$phone."','".$email."')");

    echo "
	      <script>
    	      alert('회원가입이 완료 되었습니다.');
	          location.href = 'index.php';
	      </script>
	  ";
?>

   

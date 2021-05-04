<?php  
// the code for creating a connection with the database
  $servername = "dileks-air.ru";  
  $username = "ymacker_diltest";  
  $password = "isvFFAr8";
  $table = "feedback_contacts";
  $connection = mysqli_connect ($servername , $username , $password, $table) or die("unable to connect to host");  
  // $sql = mysqli_select_db ('test', $connection) or die("unable to connect to database"); 

  if ($connection == false){
    print("Ошибка: Невозможно подключиться к MySQL " . mysqli_connect_error());
}
else {
    print("Соединение установлено успешно");
}

// mysqli_close($connection);
?>  
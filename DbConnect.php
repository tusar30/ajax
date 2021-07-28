<?php

function connection()
{
    $connection =new mysqli("localhost","tusar10","12345678","wtk");
    if($connection->connect_errno)
    {
        die("Database connection failed.".$connection->connect_error);
    }
    return $connection;
}

function register($fname,$lname,$gender,$dob,$religion,$present_address,$parmanent_address,$phone,$email,$link,$userName,$password)
{
     $conn = connect();
    $sql = $conn->prepare("INSERT INTO users VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssisssssss", $user->username, $user->password, $user->fname, $user->lname, $user->gender, $user->dob, $user->religion, $user->present_address, $user->permanent_address, $user->phone, $user->email, $user->url);
    $sql->execute();
    if($sql->errno === 0) {
      return TRUE;
    }
    return FALSE;
  }

function login($userName,$password)
{
    $connection=connection();
    $sql=$connection->prepare("SELECT * FROM users WHERE userName = ? and password = ?");
    $sql->bind_param("ss",$userName,$password);
    $sql->execute();
    $response=$sql->get_result();
    return $response->num_rows === 1;
}
function delete($uid,$userName)
{
    $connection=connection();
    $sql=$connection->prepare("DELETE FROM users WHERE id = ? and userName = ?");
    $sql->bind_param("is",$uid,$userName);
    return $sql->execute();
}

function getAllUsers()
{
    $connection=connection();
    $sql=$connection->prepare("SELECT * FROM users");
    $sql->execute();
    $response=$sql->get_result();
    return $response->fetch_all(MYSQLI_ASSOC);
}
 
function getUser($userName)
{
    $connection=connection();
    $sql=$connection->prepare("SELECT * FROM users WHERE userName = ?");
    $sql->bind_param("s",$userName);
    $sql->execute();
    $response=$sql->get_result();
    return $response->fetch_all(MYSQLI_ASSOC);
}

 ?>
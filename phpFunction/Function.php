<?php
session_start();
function create_link()
{
    $serverName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "Hotel_project";
    $link = mysqli_connect($serverName, $userName, $password, $dbName);
    if (mysqli_connect_errno()) {
        return 100;
    }
    return $link;
}
function check_exist($userName)
{
    $link = create_link();
    if ($link === 100) {
        return 100;
    } else {
        $query = "SELECT userId FROM user WHERE username='" . $userName."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);
        if (!is_null($row)) {
            return 102;
        } else return 103;
    }
}
function Add_user($var)
{
    $link = create_link();
    if ($link === 100) {
        return 100;
    } else {
        if (check_exist($var['username']) == 103) {
            $query = "INSERT INTO
         `user`(`name`, `lastname`, `username`, `password`, `phone`)
          VALUES ('". $var['name'] . "','" . $var['lastname'] . "',
          '" . $var['username'] . "','" . $var['password'] . "','" . $var['phone'] . "')";

            $result = mysqli_query($link, $query);

            if ($result) {
                return 101;
            }
        } else return 102;
    }
}
function getdata($userName){
    $link=create_link();
    if($link===100){
        return 100;
    }
    else{
        $query="SELECT * FROM user WHERE username='".$userName."'";
        $result=mysqli_query($link,$query);
        $row=mysqli_fetch_assoc($result);
        return $row;
    }
}
function login($userName , $password ){
    $link = create_link();
    if($link!==10){
        $query = "SELECT `userId` FROM `user` WHERE username='".$userName."' and password='".$password."'";
        $result = mysqli_query($link, $query);
        $row = mysqli_fetch_assoc($result);
        if (!is_null($row)) {
            return 102;
        } else return 103;
    }
    else return 100;
    
}

function get_room($price=0){
    $link=create_link();
    if($link === 100){
        return 100;
    }
    else{
        $query = "SELECT * FROM room WHERE price>=".$price;
        $result = mysqli_query($link,$query);
        $data_room=array();
        while($row = mysqli_fetch_assoc($result)){
            array_push($data_room,$row);
        }
        return $data_room;
    }
}

function get_room_1($id){
    $link=create_link();
    if($link === 100){
        return 100;
    }else{
        $query="SELECT * FROM room WHERE roomId=".$id;
        $result =mysqli_query($link,$query);
        $room=mysqli_fetch_assoc($result);
        if(is_null($room))return 103;
        else return $room;
    }
}

function add_reserve($var)
{
    $link=create_link();
    if($link===100){
        return 100;
    }
    else {
        $query="INSERT INTO `reserve`(`roomId`, `userId`, `datestart`)
         VALUES ('".$var['roomId']."','".$var['userId']."','".$var['datestart']."')";
         $result=mysqli_query($link,$query);
         if($result){
            return 101;
         }
    }
}

function add_room($var){
    $link=create_link();
    if($link===100){
        return 100;
    }
    else{
        $query="INSERT INTO `room`(`price`, `verify_food`, `capacity`, `floor`)
         VALUES ('".$var['price']."','".$var['verify_food']."','".$var['capacity']."','".$var['floor']."')";
         $result=mysqli_query($link,$query);
         if($result){
            return 101;
         }
    }
}


//100 -> no conection
//101 -> add is ok
//102 -> is exist
//103 -> no exist

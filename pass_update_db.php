<?php
    session_start();
    extract($_POST);
    $conn = mysqli_connect( 'localhost','root',"",'sports' );

//Password UPDATE
    if(isset($_POST['update'])){
        $current=$_POST['current_password'];
        $new=$_POST['new_password'];
        $confirm=$_POST['confirm_password'];
        // $role=$_SESSION['role'];
        $username=$_SESSION['username'];
        $response=array();
            $sql="SELECT password FROM login WHERE username='$username'";
            $result=mysqli_query($conn,$sql);
            $row=mysqli_fetch_assoc($result);
            $current=sha1($current);
            if($current==$row['password']){
                $new=sha1($new);
                $confirm=sha1($confirm);
                if($new==$confirm){
                    $uquery="UPDATE login SET password='$new' WHERE username='$username'";
                    if(mysqli_query($conn,$uquery)){
                        $response['success']='Password updated successfully';
                    }
                    else{
                        $response['error']='Error while updating password';
                    }
                }
                else{
                    $response['error']='New password and Confirm Password do not match';
                }
            }
            else{
                $response['error']='Current password is wrong';
            }
            echo json_encode($response);
        }
//Username Update
        if(isset($_POST['update_username'])){
            $current=$_POST['current_username'];
            $new=$_POST['new_username'];
            // $role=$_SESSION['role'];
            $username=$_SESSION['username'];
            $response=array();
                $sql="SELECT username FROM login WHERE username='$username'";
                $result=mysqli_query($conn,$sql);
                $row=mysqli_fetch_assoc($result);
                if($current==$row['username']){
                        $uquery="UPDATE login SET username='$new' WHERE username='$username'";
                        if(mysqli_query($conn,$uquery)){
                            $response['success']='Username updated successfully';
                        }
                        else{
                            $response['error']='Error while updating Username';
                        }
                }
                else{
                    $response['error']='Current username is wrong';
                }
                echo json_encode($response);
            }
?>

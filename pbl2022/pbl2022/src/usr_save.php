<?php
require_once('db_inc.php');
if (isset($_POST['act'])){
  $act = $_POST['act'];
  if ($_POST['pass1']===$_POST['pass2']){
    $user_id = $_POST['user_id'];
    $usertype_id = $_POST['usertype_id'];
    $user_name = $_POST['user_name'];
    $upass = $_POST['pass1'];
    $usertype_id = $_POST['usertype_id'];
    //新規作成する場合
    $sql ="INSERT INTO t_user(user_id,user_name,password,usertype_id) VALUES ('{$user_id}','{$user_name}','{$upass}','{$usertype_id}')";
    if ($act=='update'){  //編集する場合
      $sql = "UPDATE t_user SET user_name='{$user_name}',password='{$upass}',usertype_id='{$usertype_id}'' WHERE user_id='{$user_id}'";
    }
    //echo $sql;
    $conn->query($sql);
    echo '<h3>アカウントが更新されました</h3>';
  }else{
    echo '<h3>エラー：パスワードが一致しないので登録できません</h3>';
  }
}
?>
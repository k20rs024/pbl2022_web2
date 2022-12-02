<?php
  require_once('db_inc.php'); //データベースが必要なので読み込ませる
  $u = $_POST['USER_ID'] ;  
  $p = $_POST['USER_PASSWORD'];  
  $sql = "SELECT * FROM T_USER WHERE USER_ID= '{$u}'  AND USER_PASSWORD='{$p}'";
  $rs = $conn->query($sql);
  if (!$rs) die('エラー: ' . $conn->error);
  $row= $rs->fetch_assoc();
  if ($row){ //Login succeeded
    $_SESSION['USER_ID']   = $row['USER_ID'];
    $_SESSION['USER_SURNAME'] = $row['USER_SURNAME'];
    $_SESSION['USER_NAME'] = $row['USER_NAME'];
    $_SESSION['USER_SURNAME2'] = $row['USER_SURNAME2'];
    $_SESSION['USER_NAME2'] = $row['USER_NAME2'];
    $_SESSION['USER_NICKNAME'] = $row['USER_NICKNAME'];
    $_SESSION['USERTYPE_ID'] = $row['USERTYPE_ID'];
    header('Location:index.php');   
  }else{
    header('Location:?do=sys_login');   
  }
?>
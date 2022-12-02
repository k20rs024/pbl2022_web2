<?php
require_once('db_inc.php');
if (isset($_GET['user_id'])){
  $user_id = $_GET['user_id'];
  echo '<h2>'. $user_id . 'を本当に削除しますか?</h2>';
  echo '<a href="?do=usr_delete&user_id2='. $user_id . '">削除</a> | <a href="?do=usr_list">戻る</a>';
}else if (isset($_GET['user_id2'])){
   $user_id = $_GET['user_id2'];
   $sql = "DELETE FROM t_user WHERE user_id='{$user_id}'";
   $conn->query($sql);
   header('Location:?do=usr_list');
}else{
  echo '<h2>削除するユーザIDは与えられていません</h2>';
  echo '<a href="?do=usr_list">戻る</a>';
}
?>
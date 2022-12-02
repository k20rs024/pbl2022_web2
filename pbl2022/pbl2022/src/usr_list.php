<h3>アカウント一覧</h3>
<?php
require_once('db_inc.php');

$where = '1';
include('usr_search.php');

// 一覧するデータを検索するSQL
//$sql = "SELECT * FROM T_USER WHERE $where ORDER BY USERTYPE_ID, USER_ID";
$sql = "SELECT * FROM T_USER WHERE $where ORDER BY USER_SURNAME2 ASC";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

echo '<table border=1>';
// まず、ヘッド部分（項目名）を出力
echo '<tr><th>社員名</th><th>ふりがな</th><th>ID</th><th colspan="2">操作</th></tr>';

// ユーザID（user_id）、ユーザ名(user_name)、ユーザ種別(usertype_id)を一覧表示
$row= $rs->fetch_assoc();
while ($row) {
  echo '<tr>';
  echo '<td>'.$row['USER_SURNAME']. $row['USER_NAME'].'</td>';
  echo '<td>' . $row['USER_SURNAME2']. $row['USER_NAME2']. '</td>';
  echo '<td>' . $row['USER_ID'] . '</td>';
  
 // echo '<td>' . $row['usertype_id']. '</td>';
 //$codes = array('1'=>'社員', '2'=>'システム管理者');
 //$i  = $row['USERTYPE_ID'];     // 数字のユーザ種別をで取得
 //echo '<td>' . $codes[$i] . '</td>'; // ユーザ種別名を出力
 $user_id = $row['USER_ID'];
  echo '<td><a href="?do=usr_detail&user_id='.$user_id.'">詳細</a></td>';  
 echo '<td><a href="?do=usr_add&user_id='.$user_id.'">編集</a></td>'; 
 echo '<td><a href="?do=usr_delete&user_id='.$user_id.'">削除</a></td>';  
 echo '</tr>';
 $row= $rs->fetch_assoc();//次の行へ
}
echo '</table>';
?>
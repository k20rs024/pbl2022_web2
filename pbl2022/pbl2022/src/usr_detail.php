<h3>アカウント詳細</h3>
<?php 
require_once('db_inc.php');
$uid  = $_GET['user_id'];     // ユーザIDでユーザを特定

$sql = "SELECT * FROM t_user WHERE user_id='{$uid}'";
$rs = $conn->query($sql);
if (!$rs) die('エラー: ' . $conn->error);

echo '<table border=1>';
$row= $rs->fetch_assoc();
if ($row) {
 echo '<tr><th>ユーザID</th><td>' . $row['user_id'] . '</td></tr>';
 echo '<tr><th>ユーザ名</th><td>' . $row['user_name']. '</td></tr>';
 $codes = array('1'=>'会員', '2'=>'ゲスト', '9'=>'管理者' );
 $i  = $row['usertype_id'];     // 数字のユーザ種別を取得
 echo '<tr><th>ユーザ種別</th><td>' . $codes[$i]. '</td></tr>';
}
echo '</table>';
?>
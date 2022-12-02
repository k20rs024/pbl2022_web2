<?php
require_once('db_inc.php');
$codes = array('1'=>'会員', '2'=>'ゲスト','9'=>'管理者');
// 変数の初期化。新規登録か編集かにより異なる。
$act = 'insert';// 新規登録の場合
$user_id = $user_name = ''; $usertype_id = 1;
if (isset($_GET['user_id'])){//既存アカウントを編集する場合
  $user_id = $_GET['user_id'] ; 
  // 既存アカウントの情報を検索するSQL文
  $sql = "SELECT * FROM t_user WHERE user_id='{$user_id}'";
  // データベースへ問合せのSQL($sql)を実行する・・・
  $rs = $conn->query($sql);;
  if (!$rs) die('エラー: ' . $conn->error);
  
  //問合せ結果を取得し、それぞれの変数に代入しておく
  $row= $rs->fetch_assoc();;
  if ($row){ // 既存アカウントを編集するために、変数に代入
    $act = 'update';
    $user_name = $row['user_name'];
    $usertype_id = $row['usertype_id'];
  }
}
?>
<h2>アカウント登録・編集</h2>
<form action="?do=usr_save" method="post">
<input type="hidden" name="act" value="<?php echo $act; ?>">
<table>
<tr><td>ユーザID：</td><td>
<?php
if ($act=='insert'){
  echo '<input type="text" name="user_id">';//テキストボックス
}else {
  echo '<input type="hidden" name="user_id" value="'.$user_id.'">';//非表示送信
  echo "<b>$user_id</b>";
}
?>
</td></tr>
<tr><td>氏　名：</td><td>
  <input type="text" name="user_name"  value="<?php echo $user_name;?>">
</td></tr>
<tr><td>パスワード</td><td>
  <input type="password" name="pass1">
</td></tr>
<tr><td>（再入力）</td><td>
  <input type="password" name="pass2">
</td></tr>
<tr><td>ユーザ種別</td><td>
<?php
  foreach ($codes as $key => $value){
    if ($key==$usertype_id){
      echo '<input type="radio" name="usertype_id" value="' . $key .'" checked>' . $value;
    }else{
      echo '<input type="radio" name="usertype_id" value="' . $key .'">' . $value;
    }
  }
?>  
</td></tr>
</table>
<input type="submit" value="登録"><input type="reset" value="取消">
</form>
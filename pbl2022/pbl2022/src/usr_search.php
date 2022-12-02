<?php
$usertype_id = 0;
if (isset($_POST['usertype_id'])){
  $usertype_id = $_POST['usertype_id'];
}
$keyword = '';
if (isset($_POST['keyword'])){
  $keyword = $_POST['keyword'];
}
$usertype_ids = array(
  '0'=>'全員',
  '1'=>'会員', 
  '2'=>'ゲスト', 
  '9'=>'管理者'
 );
echo '<form action="?do=usr_list" method="post">';
echo 'キーワード:';
echo '<input type="text" name="keyword" value="'. $keyword. '">';
echo '<br>';
foreach ($usertype_ids as $role=>$name){
  $checked = ($role==$usertype_id)?' checked' : '';
  echo '<input type="radio" name="usertype_id" value="'. $role. '" '. $checked. '>' . $name;
}
echo '<input type="submit" value="検索">';
echo '</form>';
$where = '1';
if ($usertype_id != '0'){
  $where .=" AND usertype_id='$usertype_id'";
}
if ( !empty($keyword) ) {
  $where .=" AND ( user_name LIKE '%$keyword%'";
  $where .=" OR  user_id LIKE '%$keyword%')";
}
?>
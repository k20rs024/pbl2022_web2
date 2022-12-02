<!DOCTYPE html> 
<html><head>
<meta http-equiv="Content-TYPE" content="text/html; charset=UTF-8">
<link rel="stylesheet" TYPE="text/css" href="css/style.css">
</head>
<body>
<div class="wrapper">
<div id="navbar">
<?php
if (isset($_SESSION['USERTYPE_ID'])){
  echo $_SESSION['USER_NAME'].' &nbsp;&nbsp;&nbsp;';
  $menu = array();//メニュー項目：プログラム名（拡張子.php省略）
  if ($_SESSION['USERTYPE_ID']==='1'){  //社員
    $menu = array(   //社員メニュー
      'ホーム'  => 'pb_home',
      '店舗一覧'  => 'rst_list',
      'おすすめ店舗一覧'  => 'rst_favor',
      '店舗登録'  => 'rst_add',
      'ユーザ情報編集'  => 'usr_edit',
      'ログアウト'  => 'sys_logout'
    );
  }
  if ($_SESSION['USERTYPE_ID']==='2'){  //管理者
    $menu = array(   //管理者メニュー
      'ホーム'  => 'pb_home',
      '店舗一覧'  => 'rst_list',
      'おすすめ店舗一覧'  => 'rst_favor',
      'ユーザ登録'  => 'usr_add',
      'ユーザ一覧'  => 'usr_list' 
    );
  } else {
    $menu = array(   //管理者メニュー
      'ホーム'  => 'pb_home',
      '店舗一覧'  => 'rst_list',
      'おすすめ店舗一覧'  => 'rst_favor'
    );
  }
  foreach($menu as $label=>$action){ 
    echo  '<a href="?do=' . $action . '">' . $label . '</a>&nbsp;&nbsp;' ;
  }

  echo  '<a href="?do=sys_logout">ログアウト</a>&nbsp;&nbsp;' ;
  
}else{
   echo  '<a href="?do=sys_login">ログイン</a>' ;
}
?>
</div>
<h2 align="center">ログイン</h2>
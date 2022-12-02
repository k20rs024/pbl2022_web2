-- Project Name : グルメ情報Webシステム
-- Date/Time    : 2020/05/31 13:12:45
-- Author       : 株式会社ダカラ
-- RDBMS Type   : MySQL
-- Application  : A5:SQL Mk-2

/*
  BackupToTempTable, RestoreFromTempTable疑似命令が付加されています。
  これにより、drop table, create table 後もデータが残ります。
  この機能は一時的に $$TableName のような一時テーブルを作成します。
*/

-- 口コミ
--* RestoreFromTempTable
create table `T_REVEIEW` (
  `REVIEW_POINT` VARCHAR(8) not null comment '口コミID'
  , `EVAL_POINT` INT not null comment '評価点'
  , `REVIEW_COMMENT` VARCHAR(1024) not null comment 'コメント'
  , `RST_ID` LONG not null comment '店舗ID'
  , `USER_ID` VARCHAR(32) not null comment '登録ユーザID'
  , constraint `T_REVEIEW_PKC` primary key (`REVIEW_POINT`)
) comment '口コミ' ;

-- 店舗情報
--* RestoreFromTempTable
create table `T_RSTINFO` (
  `RST_ID` LONG not null comment '店舗ID'
  , `RST_NAME` VARCHAR(64) not null comment '店舗名'
  , `RST_KANA` VARCHAR(64) comment '店舗名（カナ）'
  , `RST_ADDRESS` VARCHAR(256) comment '住所'
  , `RST_HOLIDAY` VARCHAR(32) comment '店休日'
  , `START_TIME` TIME comment '営業開始時間'
  , `END_TIME` TIME comment '営業終了時間'
  , `TEL_NUM` VARCHAR(32) comment '電話番号'
  , `GENRE` VARCHAR(32) comment 'ジャンル:店舗のジャンル名'
  , `RST_INFO` VARCHAR(2048) comment '店舗情報:店舗の概要・オススメなど'
  , `MAP` VARCHAR(1024) comment '地図:店舗の地図情報（URLやマップ埋め込みリンクなど）'
  , `PHOTO1` BLOB comment '写真1'
  , `PHOTO2` BLOB comment '写真2'
  , `PHOTO3` BLOB comment '写真3'
  , `USER_ID` VARCHAR(32) not null comment '登録ユーザID:店舗を登録したユーザのID'
  , constraint `T_RSTINFO_PKC` primary key (`RST_ID`)
) comment '店舗情報' ;

-- ユーザ
--* RestoreFromTempTable
create table `T_USER` (
  `USER_ID` VARCHAR(32) not null comment 'ユーザID:ユーザのログインID'
  , `USER_NAME` VARCHAR(32) not null comment 'アカウント名:ユーザの氏名'
  , `USER_KANA` VARCHAR(32) comment 'アカウント名（カナ）:ユーザの氏名（カナ）'
  , `PASSWORD` VARCHAR(32) not null comment 'パスワード:ユーザのログインパスワード'
  , `USERTYPE_ID` VARCHAR(1) not null comment 'ユーザ種別ID'
  , constraint `T_USER_PKC` primary key (`USER_ID`)
) comment 'ユーザ' ;

-- ユーザ種別
--* RestoreFromTempTable
create table `T_USERTYPE` (
  `USERTYPE_ID` VARCHAR(1) not null comment 'ユーザ種別ID'
  , `USERTYPE` VARCHAR(16) not null comment 'ユーザ種別:ユーザ種別名'
  , constraint `T_USERTYPE_PKC` primary key (`USERTYPE_ID`)
) comment 'ユーザ種別' ;


-- Project Name : グルメ情報Webシステム
-- Date/Time    : 2022/11/21 
-- RDBMS Type   : MySQL

-- 口コミ
create table t_review (
  review_id SERIAL comment '口コミID'
  , eval_point INT not null comment '評価点, 1..5'
  , review_comment VARCHAR(1024) not null comment 'コメント'
  , rst_id BIGINT not null comment '店舗ID'
  , user_id VARCHAR(32) not null comment '登録ユーザID'
  , constraint t_review_pkc primary key (review_id)
) comment '口コミ' ;

-- 店舗情報
create table t_rstinfo (
  rst_id SERIAL comment '店舗ID'
  , rst_name VARCHAR(64) not null comment '店舗名'
  , rst_kana VARCHAR(64) comment '店舗名（カナ）'
  , rst_address VARCHAR(256) comment '住所'
  , rst_holiday VARCHAR(32) comment '店休日'
  , start_time TIME comment '営業開始時間'
  , end_time TIME comment '営業終了時間'
  , tel_num VARCHAR(32) comment '電話番号'
  , genre VARCHAR(32) comment 'ジャンル:店舗のジャンル名'
  , rst_info TEXT comment '店舗情報:店舗の概要・オススメなど'
  , map TEXT comment '地図:店舗の地図情報（URLやマップ埋め込みリンクなど）'
  , photo1 BLOB comment '写真1'
  , photo2 BLOB comment '写真2'
  , photo3 BLOB comment '写真3'
  , user_id VARCHAR(32) not null comment '登録ユーザID:店舗を登録したユーザのID'
  , constraint t_rstinfo_pkc primary key (rst_id)
) comment '店舗情報' ;

-- ユーザ
create table t_user (
  user_id VARCHAR(32) not null comment 'ユーザID:ユーザのログインID'
  , user_name VARCHAR(32) not null comment 'アカウント名:ユーザの氏名'
  , user_kana VARCHAR(32) comment 'アカウント名（カナ）:ユーザの氏名（カナ）'
  , password VARCHAR(32) not null comment 'パスワード:ユーザのログインパスワード'
  , usertype_id VARCHAR(1) not null comment 'ユーザ種別ID'
  , constraint t_user_pkc primary key (user_id)
) comment 'ユーザ' ;

-- ユーザ種別
-- * RestoreFromTempTable
create table t_usertype (
  usertype_id VARCHAR(1) not null comment 'ユーザ種別ID'
  , usertype VARCHAR(16) not null comment 'ユーザ種別:ユーザ種別名'
  , constraint t_usertype_pkc primary key (usertype_id)
) comment 'ユーザ種別' ;


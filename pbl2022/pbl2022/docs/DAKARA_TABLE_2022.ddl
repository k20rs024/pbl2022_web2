-- Project Name : �O�������Web�V�X�e��
-- Date/Time    : 2020/05/31 13:12:45
-- Author       : ������Ѓ_�J��
-- RDBMS Type   : MySQL
-- Application  : A5:SQL Mk-2

/*
  BackupToTempTable, RestoreFromTempTable�^�����߂��t������Ă��܂��B
  ����ɂ��Adrop table, create table ����f�[�^���c��܂��B
  ���̋@�\�͈ꎞ�I�� $$TableName �̂悤�Ȉꎞ�e�[�u�����쐬���܂��B
*/

-- ���R�~
--* RestoreFromTempTable
create table `T_REVEIEW` (
  `REVIEW_POINT` VARCHAR(8) not null comment '���R�~ID'
  , `EVAL_POINT` INT not null comment '�]���_'
  , `REVIEW_COMMENT` VARCHAR(1024) not null comment '�R�����g'
  , `RST_ID` LONG not null comment '�X��ID'
  , `USER_ID` VARCHAR(32) not null comment '�o�^���[�UID'
  , constraint `T_REVEIEW_PKC` primary key (`REVIEW_POINT`)
) comment '���R�~' ;

-- �X�܏��
--* RestoreFromTempTable
create table `T_RSTINFO` (
  `RST_ID` LONG not null comment '�X��ID'
  , `RST_NAME` VARCHAR(64) not null comment '�X�ܖ�'
  , `RST_KANA` VARCHAR(64) comment '�X�ܖ��i�J�i�j'
  , `RST_ADDRESS` VARCHAR(256) comment '�Z��'
  , `RST_HOLIDAY` VARCHAR(32) comment '�X�x��'
  , `START_TIME` TIME comment '�c�ƊJ�n����'
  , `END_TIME` TIME comment '�c�ƏI������'
  , `TEL_NUM` VARCHAR(32) comment '�d�b�ԍ�'
  , `GENRE` VARCHAR(32) comment '�W������:�X�܂̃W��������'
  , `RST_INFO` VARCHAR(2048) comment '�X�܏��:�X�܂̊T�v�E�I�X�X���Ȃ�'
  , `MAP` VARCHAR(1024) comment '�n�}:�X�܂̒n�}���iURL��}�b�v���ߍ��݃����N�Ȃǁj'
  , `PHOTO1` BLOB comment '�ʐ^1'
  , `PHOTO2` BLOB comment '�ʐ^2'
  , `PHOTO3` BLOB comment '�ʐ^3'
  , `USER_ID` VARCHAR(32) not null comment '�o�^���[�UID:�X�܂�o�^�������[�U��ID'
  , constraint `T_RSTINFO_PKC` primary key (`RST_ID`)
) comment '�X�܏��' ;

-- ���[�U
--* RestoreFromTempTable
create table `T_USER` (
  `USER_ID` VARCHAR(32) not null comment '���[�UID:���[�U�̃��O�C��ID'
  , `USER_NAME` VARCHAR(32) not null comment '�A�J�E���g��:���[�U�̎���'
  , `USER_KANA` VARCHAR(32) comment '�A�J�E���g���i�J�i�j:���[�U�̎����i�J�i�j'
  , `PASSWORD` VARCHAR(32) not null comment '�p�X���[�h:���[�U�̃��O�C���p�X���[�h'
  , `USERTYPE_ID` VARCHAR(1) not null comment '���[�U���ID'
  , constraint `T_USER_PKC` primary key (`USER_ID`)
) comment '���[�U' ;

-- ���[�U���
--* RestoreFromTempTable
create table `T_USERTYPE` (
  `USERTYPE_ID` VARCHAR(1) not null comment '���[�U���ID'
  , `USERTYPE` VARCHAR(16) not null comment '���[�U���:���[�U��ʖ�'
  , constraint `T_USERTYPE_PKC` primary key (`USERTYPE_ID`)
) comment '���[�U���' ;


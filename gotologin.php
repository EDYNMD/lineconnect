<?php

//WordPress�̊�{�@�\��ǂݍ���
require_once ('../../../wp-load.php');
//�ݒ�t�@�C����ǂݍ���
require_once ('config.php');

//�p���[���[�^���烊�_�C���N�g����擾
$redirect_to = $_GET['redirect_to'];

if($redirect_to){
	$user_id = get_current_user_id();
	//���O�C�����Ă��Ȃ��ꍇ���O�C���y�[�W�փ��_�C���N�g
	if(!$user_id){

		//COOKIE�Ƀ��_�C���N�g����i�[
		setcookie ('line_connect_redirect_to',$redirect_to, 0,'/',"",TRUE,TRUE);

		//���_�C���N�gURL���Z�b�g
		$site_url=get_site_url(null, '/');
		$redirect_url = $site_url.$login_path;

		//���O�C���y�[�W�փ��_�C���N�g������
		header('Location: ' . $redirect_url);
	}else{
		//���O�C�����Ă���ꍇ�͒��ڃA�J�E���g�����N�p�̃y�[�W��
		header('Location: ' . $redirect_to);
	}


}else{
	print "Bad args";
}
exit();


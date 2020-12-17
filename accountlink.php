<?php

//WordPress�̊�{�@�\��ǂݍ���
require_once ('../../../wp-blog-header.php');

$user_id = get_current_user_id();
//���O�C�����Ă��Ȃ��ꍇ
if(!$user_id){
	exit('Forbidden: Please Login first.');
}

//�p���[���[�^����linkToken���擾
$linkToken = $_GET['linkToken'];

//nonce�쐬
$nonce = base64_encode(lineconnect_makeRandStr(32));

//WP�̃I�v�V�����Ƃ��ĕۑ�
$option_key_nonce = "lineconnect_nonce".$nonce;
update_option($option_key_nonce, $user_id);

//���_�C���N�gURL���Z�b�g
$redirect_url = "https://access.line.me/dialog/bot/accountLink?linkToken=$linkToken&nonce=$nonce";

header('Location: ' . $redirect_url);
exit();

//�����_���ȕ������Ԃ�
function lineconnect_makeRandStr($length) {
    $str = array_merge(range('a', 'z'), range('0', '9'), range('A', 'Z'));
    $r_str = null;
    for ($i = 0; $i < $length; $i++) {
        $r_str .= $str[rand(0, count($str) - 1)];
    }
    return $r_str;
}

<?php
/**
 * rep2 - �Ǘ��җp�ݒ�t�@�C��
 *
 * ���̃t�@�C���̐ݒ�́A�K�v�ɉ����ĕύX���Ă�������
 */

// ----------------------------------------------------------------------
// {{{ �f�[�^�ۑ��f�B���N�g��

// ���ꂼ��p�[�~�b�V������0777���AWeb�T�[�o�[���������߂�悤�ɂ��Ă����B
// Web����A�N�Z�X�ł��Ȃ��Ƃ���ɔz�u����̂��]�܂����B

// p2�Ŏg�p�����{�̃f�[�^�ۑ��f�B���N�g��
$_conf['data_dir'] = P2_BASE_DIR . '/data';

// �擾�X���b�h�� dat �f�[�^�ۑ��f�B���N�g��
$_conf['dat_dir'] = $_conf['data_dir'] . '/dat';

// �擾�X���b�h�� idx �f�[�^�ۑ��f�B���N�g��
$_conf['idx_dir'] = $_conf['data_dir'] . '/idx';

// �����ݒ�f�[�^�ۑ��f�B���N�g��
$_conf['pref_dir'] = $_conf['data_dir'] . '/pref';

// SQLite3�f�[�^�x�[�X�ۑ��f�B���N�g��
$_conf['db_dir'] = $_conf['data_dir'] . '/db';

// }}}
// ----------------------------------------------------------------------
// {{{ ���o�[�X�v���L�V

// ���o�[�X�v���L�V��ʂ��ăA�N�Z�X����ۂ̃z�X�g���B
// $_SERVER['HTTP_HOST'] ���㏑�����A�I���W�i���̒l��
// $_SERVER['X_REP2_ORIG_HTTP_HOST'] �ɏ������ށB
// 'auto' �̏ꍇ�A$_SERVER['HTTP_X_FORWARDED_HOST'] ��
// �ݒ肳��Ă���ꍇ�����K�p�����
$_conf['reverse_proxy_host'] = 'localhost';  // ("")

// ���o�[�X�v���L�V��ʂ��ăA�N�Z�X����ۂ̃|�[�g�ԍ��B
// $_SERVER['HTTP_PORT'] ���㏑�����A�I���W�i���̒l��
// $_SERVER['X_REP2_ORIG_HTTP_PORT'] �ɏ������ށB
// 'auto' �̏ꍇ�A$_SERVER['HTTP_X_FORWARDED_PORT'] ��
// �ݒ肳��Ă���ꍇ�����K�p�����B
$_conf['reverse_proxy_port'] = '8080';  // ("")

// ���o�[�X�v���L�V��ʂ��ăA�N�Z�X����ۂ̃p�X�B
// $_SERVER['REQUEST_URI'], $_SERVER['SCRIPT_NAME'], $_SERVER['PHP_SELF']
// �̑O�ɕt�������B
// �I���W�i���̒l�́A���ꂼ�� $_SERVER["X_REP2_ORIG_{$key}"] �ɏ������܂��B
// reverse_proxy_host �������̂Ƃ��͖��������B
$_conf['reverse_proxy_path'] = '';  // ("")

// }}}
// ----------------------------------------------------------------------
// {{{ ��������

// �������݂��f���T�[�o�Œ��ڍs���悤�� �i����:1, ���Ȃ�:0�j
$_conf['disable_res'] = 0;          // (0)

// �������񂾃��X�̍ő�L�^�� // ���̐ݒ�͌��݂͋@�\���Ă��Ȃ�
//$_conf['posted_rec_num'] = 1000;    // (1000)

// }}}
// ----------------------------------------------------------------------
// {{{ �e��ݒ�

// session�f�[�^�̕ۑ��Ǘ� (PHP�f�t�H���g:'', p2�Ńt�@�C���Ǘ�:'p2')
$_conf['session_save'] = 'p2';      // ('p2')

// Cookie ID�̗L����������
$_conf['cid_expire_day'] = 30;      // (30)

// �l�b�g���[�N�ڑ��^�C���A�E�g���� (�b)
// @deprecated use $_conf['http_conn_timeout'] and $_conf['http_read_timeout']
$_conf['fsockopen_time_limit'] = 7; // (7)

// HTTP�ڑ��^�C���A�E�g���� (�b)
$_conf['http_conn_timeout'] = 2; // (2)

// HTTP�Ǎ��^�C���A�E�g���� (�b)
$_conf['http_read_timeout'] = 8; // (8)

// p2�̍ŐV�o�[�W�����������`�F�b�N(����:1, ���Ȃ�:0)
$_conf['updatan_haahaa'] = 1;       // (1)

// p2status�i�A�b�v�f�[�g�`�F�b�N�j�̃L���b�V�����X�V�����ɕێ����鎞�� (��)
$_conf['p2status_dl_interval'] = 7; // (7)

// �X���b�h�T�u�W�F�N�g�ꗗ�̃f�t�H���g�\���� (100, 150, 200, 250, 300, 400, 500, "all")
$_conf['display_threads_num'] = 150; // (150)

// �� menu �̃L���b�V�����X�V�����ɕێ����鎞�� (hour)
$_conf['menu_dl_interval'] = 1;     // (1)

// subject.txt �̃L���b�V�����X�V�����ɕێ����鎞�� (�b)
$_conf['sb_dl_interval'] = 300;     // (300)

// dat �̃L���b�V�����X�V�����ɕێ����鎞�� (�b) // ���̐ݒ�͌��݂͋@�\���Ă��Ȃ�
// $_conf['dat_dl_interval'] = 20;  // (20)

// ���O�C�����O���L�^�i����:1, ���Ȃ�:0�j
$_conf['login_log_rec'] = 1;        // (1)

// ���O�C�����O�̋L�^��
$_conf['login_log_rec_num'] = 200;  // (200)

// �O�񃍃O�C������\���i����:1, ���Ȃ�:0�j
$_conf['last_login_log_show'] = 1;  // (1)

// �V���܂Ƃߓǂ݂̃L���b�V�����c���� (����:0, ����:-1)
$_conf['matome_cache_max'] = 5; // (5)

// }}}
// ----------------------------------------------------------------------
// {{{ �g�уA�N�Z�X�L�[

$_conf['k_accesskey'] = array(
    'matome' => '3', // �V�܂Ƃ�
    'latest' => '3', // �V
    'res'    => '7', // ڽ
    'above'  => '2', // ��
    'up'     => '5', // �i�j
    'prev'   => '4', // �O
    'bottom' => '8', // ��
    'next'   => '6', // ��
    'info'   => '9', // ��
    'dele'   => '*', // ��
    'filter' => '#', // ��
);

// }}}
// ----------------------------------------------------------------------
// {{{ �g���p�b�N

include P2_CONFIG_DIR . '/conf_admin_ex.inc.php';

// }}}

/*
 * Local Variables:
 * mode: php
 * coding: cp932
 * tab-width: 4
 * c-basic-offset: 4
 * indent-tabs-mode: nil
 * End:
 */
// vim: set syn=php fenc=cp932 ai et ts=4 sw=4 sts=4 fdm=marker:
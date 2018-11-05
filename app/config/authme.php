<?php
/**
 * Authme Authentication Library
 *
 * @package Authentication
 * @category Libraries
 * @link http://dev7studios.com
 * @version 1.0
 */

$config['authme_users_table'] = 'user';
$config['authme_password_min_length'] = 6;
$config['authme_portable_hashes'] = false;

$config['cookie_name']      = 'autologin';
$config['cookie_encrypt']   = TRUE;
$config['autologin_table']  = 'autologin';
$config['autologin_expire'] = 5184000; // 60 days
$config['hash_algorithm']   = 'sha256';

/* End of file: authme.php */
/* Location: application/config/authme.php */
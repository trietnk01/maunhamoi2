<?php
clearstatcache();
ob_start();
require_once trailingslashit( get_template_directory() ) . 'inc/init.php';
if ( is_localhost() ) {
	show_admin_bar( false );
}
ob_get_clean();

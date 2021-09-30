<?php
/**
 * Constants
 */

namespace WP6;

define( 'WP6_URL', get_template_directory_uri() );
define( 'WP6_PATH', dirname( __DIR__ ) );

const DS = DIRECTORY_SEPARATOR;

const PATH = WP6_PATH;

const URL = WP6_URL;

const INC = PATH . DS . 'inc';

const INC_URL = URL . '/' . 'inc';

const ASSETS = PATH . DS . 'assets';

const ASSETS_URL = URL . '/' . 'assets';
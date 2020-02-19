<?php
/**
 * instaFeed cron
 *
 * @package instafeed
 *
 * @var modX $modx
 */

 // For access without authorization
define('MODX_REQP', false);

require_once dirname(dirname(dirname(dirname(__FILE__)))) . '/config.core.php';
require_once MODX_CORE_PATH . 'config/' . MODX_CONFIG_KEY . '.inc.php';
require_once MODX_CONNECTORS_PATH . 'index.php';

$corePath = $modx->getOption('instafeed.core_path', null, $modx->getOption('core_path') . 'components/instafeed/');
$instaFeed = $modx->getService('instafeed', 'InstaFeed', $corePath . 'model/instafeed/', array(
    'core_path' => $corePath
));

$result = $instaFeed->import();

//echo '<pre>';
//die(print_r($result));

return $result;

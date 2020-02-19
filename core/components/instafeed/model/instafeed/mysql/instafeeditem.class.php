<?php
/**
 * @package instafeed
 */
require_once (strtr(realpath(dirname(dirname(__FILE__))), '\\', '/') . '/instafeeditem.class.php');
class InstaFeedItem_mysql extends InstaFeedItem {}
?>
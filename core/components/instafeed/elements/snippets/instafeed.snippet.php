<?php
/*
 * instaFeed
 *
 * Snippet to show intagram posts
 *
 * Usage examples:
 * [[instaFeed? &tpl=`yourTpl`]]
 *
 * @author Jan Dähne <jan.daehne@quadro-system.de>
 */

$corePath = $modx->getOption('instafeed.core_path', null, $modx->getOption('core_path') . 'components/instafeed/');
$instaFeed = $modx->getService('instafeed', 'InstaFeed', $corePath . 'model/instafeed/', array(
    'core_path' => $corePath
));

// properties
$tpl = $modx->getOption('tpl', $scriptProperties, 'instaFeedTpl', true);
$limit = $modx->getOption('limit', $scriptProperties, 12, true);
$offset = $modx->getOption('offset', $scriptProperties, 0, true);
$sortby = $modx->getOption('sortby', $scriptProperties, 'date', true);
$sortdir = $modx->getOption('sortdir', $scriptProperties, 'desc', true);
$filterUser = $modx->getOption('filterUser', $scriptProperties);
$filterContent = $modx->getOption('filterContent', $scriptProperties);
$cache = $modx->getOption('cache', $scriptProperties, true, true);
$cacheTime = $modx->getOption('cacheTime', 3600, true);
$cacheKey = $modx->getOption('cacheKey', $scriptProperties, 'instaFeed', true);


// get items
$items = $instaFeed->getItems($limit, $offset, $sortby, $sortdir, $filterUser, $filterContent, array(
    'cache' => $cache,
    'time' => $cacheTime,
    'key' => $cacheKey,
));

$output = '';

if (is_array($items)) {
    foreach ($items as $item) {
        $output .= $modx->getChunk($tpl, $item);
    }
}


return $output;
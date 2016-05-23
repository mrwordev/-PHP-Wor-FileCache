<?php
include 'WorFileCache.php';
$cache = new WorFileCache('Test', "/TestCache");
$cache->saveCache('Facebook', 'Data');
// $cache->saveCache('Honda', 'Test');
// $cache->saveCache('Isuzu', 'Test');
// $cache->saveCache('Mitsubishi', 'Test');
echo $cache->getCache('Facebook');

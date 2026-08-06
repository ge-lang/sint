<?php
// Backward-compatible URL for older bookmarks. The public home page is home.php.
header('Location: home.php' . (!empty($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : ''), true, 301);
exit;

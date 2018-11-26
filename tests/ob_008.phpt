--TEST--
ob_brotli_handler always conflicts with brotli.output_compression
--SKIPIF--
<?php
if (!extension_loaded('brotli')) die('skip');
if (version_compare(PHP_VERSION, '5.4.0', '<') die('skip need version');
?>
--INI--
output_handler=ob_brotli_handler
brotli.output_compression=0
--ENV--
HTTP_ACCEPT_ENCODING=br
--FILE--
<?php
echo "hi";
?>
--EXPECT--
� �hi
--EXPECTHEADERS--
Content-Encoding: br
Vary: Accept-Encoding

--TEST--
Bug #69579 (Internal trait double-free)
--SKIPIF--
<?php
if (!extension_loaded('zend_test')) die('skip zend_test extension not loaded');
?>
--FILE--
<?php

class Bar{
  use _ZendTestTrait;
}

$bar = new Bar();
var_dump($bar->testMethod());
// destruction causes a double-free and explodes

?>
--EXPECT--
bool(true)

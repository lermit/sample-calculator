<?php

require_once( dirname(__FILE__)."/../bootstrap/unit.php");

$t = new lime_test(13);

// Test add function
$t->is(Calculator::add(1,2),3);
$t->is(Calculator::add(1.5,2.5),4);
$t->is(Calculator::add(1.123,2),3.123);

// Test sub function
$t->is(Calculator::sub(2,1), 1);
$t->is(Calculator::sub(1,2), -1);
$t->is(Calculator::sub(-12.3, 1.3), -13.6);

// Test mul function
$t->is(Calculator::mul(1,1), 1);
$t->is(Calculator::mul(2,2), 4);
$t->is(Calculator::mul(0.5,2), 1);

// Test div function
$t->is(Calculator::div(13, 13), 1);
$t->is(Calculator::div(24, 2), 12);
$t->is(Calculator::div(13, 2), 6.5);

try 
{
  $t->is(Calculator::div(13, 0), null);
  $t->fail("Divide by zero throw an exception");
} catch ( Exception $e )
{
  $t->pass("Divide by zero throw an exception");
}


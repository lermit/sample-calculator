<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
  get('/')->

  with('request')->begin()->
    isParameter('module', 'calculator')->
    isParameter('action', 'calculator')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('form')->
    checkElement('form input', 3)->
    checkElement('form select')->
    checkElement('form select option', 4)->
  end()->

  click("calculate", array(
    "number_a" => "12",
    "number_b" => "13",
    "do"       => "add"))->

  with('response')->begin()->
    isStatusCode(302)->
  end()->
  followRedirect()->

  with('request')->begin()->
    isParameter('module', 'calculator')->
    isParameter('action', 'add')->
    isParameter('number_a', 12)->
    isParameter('number_b', 13)->
  end()->

  with('response')->begin()->
    checkElement('body', '/25/')->
  end()->

  get('/')->
  click("calculate", array(
    "number_a" => "12",
    "number_b" => "13",
    "do"       => "sub"))->

  with('response')->begin()->
    isStatusCode(302)->
  end()->
  followRedirect()->

  with('request')->begin()->
    isParameter('module', 'calculator')->
    isParameter('action', 'sub')->
    isParameter('number_a', 12)->
    isParameter('number_b', 13)->
  end()->

  with('response')->begin()->
    checkElement('body', '/-1/')->
  end()->

  get('/')->
  click("calculate", array(
    "number_a" => "12",
    "number_b" => "2",
    "do"       => "div"))->

  with('response')->begin()->
    isStatusCode(302)->
  end()->
  followRedirect()->

  with('request')->begin()->
    isParameter('module', 'calculator')->
    isParameter('action', 'divide')->
    isParameter('number_a', 12)->
    isParameter('number_b', 2)->
  end()->

  with('response')->begin()->
    checkElement('body', '/6/')->
  end()->

  get('/')->
  click("calculate", array(
    "number_a" => "12",
    "number_b" => "2",
    "do"       => "mul"))->

  with('response')->begin()->
    isStatusCode(302)->
  end()->
  followRedirect()->

  with('request')->begin()->
    isParameter('module', 'calculator')->
    isParameter('action', 'multiply')->
    isParameter('number_a', 12)->
    isParameter('number_b', 2)->
  end()->

  with('response')->begin()->
    checkElement('body', '/24/')->
  end()
;

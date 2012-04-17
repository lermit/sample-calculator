<?php

/**
 * Calculator
 *
 * @package   sample-calculator
 * @author    Romain THERRAT <romain42@gmail.com>
 * @copyright 2012 Romain THERRAT
 * @license   LGPL http://www.gnu.org/copyleft/lesser.html
 * @version   Release: 0.1
 */
class Calculator
{
  /**
   * add two numbers
   *
   * @param mixed $a
   * @param mixed $b
   * @static
   * @access public
   * @return number the result
   */
  public static function add($a, $b)
  {
    return $a+$b;
  }

  /**
   * sub two numbers
   *
   * @param mixed $a
   * @param mixed $b
   * @static
   * @access public
   * @return numbers the result
   */
  public static function sub($a, $b)
  {
    return $a-$b;
  }

  /**
   * multiply two numbers
   *
   * @param mixed $a
   * @param mixed $b
   * @static
   * @access public
   * @return numbers the result
   */
  public static function mul($a, $b)
  {
    return $a*$b;
  }

  /**
   * divide two numbers
   *
   * @param mixed $a
   * @param mixed $b
   * @static
   * @access public
   * @return numbers the result
   */
  public static function div($a, $b)
  {
    if ($b == 0)
    {
      throw new Exception("Unable to divide by zero");
    }
    return $a/$b;
  }
}

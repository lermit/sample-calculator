<?php

/**
 * calculator actions.
 *
 * @package    calculator
 * @subpackage calculator
 * @author     Romain THERRAT
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class calculatorActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function executeCalculator(sfWebRequest $request)
  {
    $action = $request->getParameter('do');
    $number_a = $request->getParameter("number_a", 0);
    $number_b = $request->getParameter("number_b", 0);

    switch($action)
    {
      case 'add':
        $this->redirect('@calculator_add?number_a='.$number_a.'&number_b='.$number_b);
        break;
      case 'sub':
        $this->redirect('@calculator_sub?number_a='.$number_a.'&number_b='.$number_b);
        break;
      case 'mul':
        $this->redirect('@calculator_mul?number_a='.$number_a.'&number_b='.$number_b);
        break;
      case 'div':
        $this->redirect('@calculator_div?number_a='.$number_a.'&number_b='.$number_b);
        break;
    }
  }

  /**
   * Add param number_a with number_b
   *
   * @param sfWebRequest $request
   * @access public
   * @return void
   */
  public function executeAdd(sfWebRequest $request)
  {
    $number_a = $request->getParameter("number_a", 0);
    $number_b = $request->getParameter("number_b", 0);

    $this->result = Calculator::add($number_a, $number_b);
    $this->setTemplate("result");
  }

  /**
   * Sub param number_a by number_b
   *
   * @param sfWebRequest $request
   * @access public
   * @return void
   */
  public function executeSub(sfWebRequest $request)
  {
    $number_a = $request->getParameter("number_a", 0);
    $number_b = $request->getParameter("number_b", 0);

    $this->result = Calculator::sub($number_a, $number_b);
    $this->setTemplate("result");
  }

  /**
   * Multiply param number_a by number_b
   *
   * @param sfWebRequest $request
   * @access public
   * @return void
   */
  public function executeMultiply(sfWebRequest $request)
  {
    $number_a = $request->getParameter("number_a", 0);
    $number_b = $request->getParameter("number_b", 0);

    $this->result = Calculator::mul($number_a, $number_b);
    $this->setTemplate("result");
  }

  /**
   * Divide param number_a by number_b
   *
   * @param sfWebRequest $request
   * @access public
   * @return void
   */
  public function executeDivide(sfWebRequest $request)
  {
    $number_a = $request->getParameter("number_a", 0);
    $number_b = $request->getParameter("number_b", 0);

    $this->result = Calculator::div($number_a, $number_b);
    $this->setTemplate("result");
  }
}

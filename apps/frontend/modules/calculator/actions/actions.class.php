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
    list($number_a, $number_b) = $this->getParamNumbers($request);

    $this->renderResult(Calculator::add($number_a, $number_b));
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
    list($number_a, $number_b) = $this->getParamNumbers($request);

    $this->renderResult(Calculator::sub($number_a, $number_b));
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
    list($number_a, $number_b) = $this->getParamNumbers($request);

    $this->renderResult(Calculator::mul($number_a, $number_b));
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
    list($number_a, $number_b) = $this->getParamNumbers($request);

    $this->renderResult(Calculator::div($number_a, $number_b));
  }

  protected function getParamNumbers(sfWebRequest $request)
  {
    $number_a = $request->getParameter("number_a", 0);
    $number_b = $request->getParameter("number_b", 0);

    return array($number_a, $number_b);
  }

  protected function renderResult($result)
  {
    $this->result = $result;
    $this->setTemplate("result");
  }
}

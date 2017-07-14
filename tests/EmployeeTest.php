<?php

/**
 * Employee PHPUnit test
 *
 * @package AutoClassifiedsPlatform
 * @copyright 2015 Internet Brands, Inc. All Rights Reserved.
 */
namespace Tests;

use Ray\Payroll\Employee;
use Ray\Payroll\PayslipProcessor;
use Ray\Payroll\PayslipInfo;
use PHPUnit_Framework_TestCase;

/**
 * EmployeeTest
 *
 * @author Ray Cui <cuidream@hotmail.com>
 */
class EmployeeTest extends PHPUnit_Framework_TestCase
{

    /**
     * first name
     *
     * @var $first_name
     */
    private $firstName = 'John';
	
	/**
     * last name
     *
     * @var $first_name
     */
    private $lastName = 'Smith';
	private $annualSalary = 60050;
	private $superRate = 9;
	private $paymentStartDate = '11-02-2016';
	private $oEmployee;
	private $oProcessor;
	
	/**
     * create an employee instance
     *
     * @test
     * @return void
     */
    public function setUp()
    {
        $this->oEmployee = new Employee($firstName, $lastName, $annualSalary, $superRate, $paymentStartDate);
    }

    /**
     * itAddsTwoNumbers test
     *
     * @test
     * @return void
     */
    public function testEmployeeAttributes()
    {
		$this->assertEquals($firstName, $this->oEmployee->getFirstName());
		$this->assertEquals($lastName, $this->oEmployee->getLastName());
		$this->assertEquals($annualSalary, $this->oEmployee->getAnnualSalary());
		$this->assertEquals($annualSalary, $this->oEmployee->getSuperRate());
		$this->assertEquals($paymentStartDate, $this->oEmployee->getPaymentStartDate());
    }
	
	public function testConstructorCalls() {
		$classname = 'Employee';
		$payslipInfo = [];
		$oEmployee_1 = new Employee($this->firstName, $this->lastName, $this->annualSalary, $this->superRate, $this->paymentStartDate);
		$oEmployee_2 = new Employee('first name', 'last name', 37000, 9, '21-07-2014');
		//var_dump($oEmployee);
		$mock = $this->getMockBuilder($classname)
          ->disableOriginalConstructor()
          ->getMock();
		$test = array($oEmployee_1, $oEmployee_2);
		$mockProcessor = $this->getMockBuilder('\Ray\Payroll\PayslipProcessor')
		  ->setMethods(array('__construct'))
		  ->disableOriginalConstructor()	
		  ->getMock();
		$mockProcessor->setEmployees($test);
		var_dump($mockProcessor->getEmployees());
		$result[0] = $mockProcessor->generatePayslip();
		var_dump($result[0]);
		
	}
	
}


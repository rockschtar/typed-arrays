<?php
/**
 * Created by PhpStorm.
 * User: rocks
 * Date: 14.06.2018
 * Time: 19:51
 */
namespace Rockschtar\TypedArrays\Test\Models;

class Values {

	private $values = [];


	public function add($value) : void {
		$this->values[] = $value;
	}

	public function get() : array {
		return $this->values;
	}

}
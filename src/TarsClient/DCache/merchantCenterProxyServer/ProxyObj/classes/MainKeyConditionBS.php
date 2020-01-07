<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class MainKeyConditionBS extends \TARS_Struct {
	const MAINKEY = 1;
	const FIELD = 2;
	const COND = 3;
	const LIMIT = 4;
	const BGETMKCOUT = 5;


	public $mainKey; 
	public $field; 
	public $cond; 
	public $limit; 
	public $bGetMKCout= false; 


	protected static $_fields = array(
		self::MAINKEY => array(
			'name'=>'mainKey',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::FIELD => array(
			'name'=>'field',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::COND => array(
			'name'=>'cond',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::LIMIT => array(
			'name'=>'limit',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
		self::BGETMKCOUT => array(
			'name'=>'bGetMKCout',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_MainKeyConditionBS', self::$_fields);
		$this->limit = new ConditionBS();
		$this->mainKey = new \TARS_Vector(\TARS::CHAR);
		$this->cond = new \TARS_Vector(new \TARS_Vector(new ConditionBS()));
	}
}

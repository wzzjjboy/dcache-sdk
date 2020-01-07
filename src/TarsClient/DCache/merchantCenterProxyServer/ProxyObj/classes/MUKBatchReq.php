<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class MUKBatchReq extends \TARS_Struct {
	const MODULENAME = 1;
	const PRIMARYKEYS = 2;
	const FIELD = 3;
	const IDCSPECIFIED = 4;


	public $moduleName; 
	public $primaryKeys; 
	public $field; 
	public $idcSpecified= ""; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::PRIMARYKEYS => array(
			'name'=>'primaryKeys',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::FIELD => array(
			'name'=>'field',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::IDCSPECIFIED => array(
			'name'=>'idcSpecified',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_MUKBatchReq', self::$_fields);
		$this->primaryKeys = new \TARS_Vector(new Record());
	}
}

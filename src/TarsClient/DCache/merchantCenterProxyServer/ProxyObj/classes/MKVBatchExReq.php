<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class MKVBatchExReq extends \TARS_Struct {
	const MODULENAME = 1;
	const COND = 2;
	const IDCSPECIFIED = 3;


	public $moduleName; 
	public $cond; 
	public $idcSpecified= ""; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::COND => array(
			'name'=>'cond',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::IDCSPECIFIED => array(
			'name'=>'idcSpecified',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_MKVBatchExReq', self::$_fields);
		$this->cond = new \TARS_Vector(new MainKeyCondition());
	}
}

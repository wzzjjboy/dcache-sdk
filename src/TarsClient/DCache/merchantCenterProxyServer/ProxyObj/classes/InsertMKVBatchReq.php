<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class InsertMKVBatchReq extends \TARS_Struct {
	const MODULENAME = 1;
	const DATA = 2;


	public $moduleName; 
	public $data; 


	protected static $_fields = array(
		self::MODULENAME => array(
			'name'=>'moduleName',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
		self::DATA => array(
			'name'=>'data',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_InsertMKVBatchReq', self::$_fields);
		$this->data = new \TARS_Vector(new InsertKeyValue());
	}
}

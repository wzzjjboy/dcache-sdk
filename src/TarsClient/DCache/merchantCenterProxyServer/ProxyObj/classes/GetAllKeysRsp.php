<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class GetAllKeysRsp extends \TARS_Struct {
	const KEYS = 1;
	const ISEND = 2;


	public $keys; 
	public $isEnd; 


	protected static $_fields = array(
		self::KEYS => array(
			'name'=>'keys',
			'required'=>true,
			'type'=>\TARS::VECTOR,
			),
		self::ISEND => array(
			'name'=>'isEnd',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_GetAllKeysRsp', self::$_fields);
		$this->keys = new \TARS_Vector(\TARS::STRING);
	}
}

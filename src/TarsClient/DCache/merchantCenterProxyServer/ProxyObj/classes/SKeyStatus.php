<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class SKeyStatus extends \TARS_Struct {
	const EXIST = 1;
	const DIRTY = 2;


	public $exist; 
	public $dirty; 


	protected static $_fields = array(
		self::EXIST => array(
			'name'=>'exist',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
		self::DIRTY => array(
			'name'=>'dirty',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_SKeyStatus', self::$_fields);
	}
}

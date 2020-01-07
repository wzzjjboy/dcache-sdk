<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class UpdateKVRsp extends \TARS_Struct {
	const RETVALUE = 1;


	public $retValue; 


	protected static $_fields = array(
		self::RETVALUE => array(
			'name'=>'retValue',
			'required'=>true,
			'type'=>\TARS::STRING,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_UpdateKVRsp', self::$_fields);
	}
}

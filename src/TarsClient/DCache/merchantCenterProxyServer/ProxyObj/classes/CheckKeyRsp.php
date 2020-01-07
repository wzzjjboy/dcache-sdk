<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class CheckKeyRsp extends \TARS_Struct {
	const KEYSTAT = 1;


	public $keyStat; 


	protected static $_fields = array(
		self::KEYSTAT => array(
			'name'=>'keyStat',
			'required'=>true,
			'type'=>\TARS::MAP,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_CheckKeyRsp', self::$_fields);
		$this->keyStat = new \TARS_Map(\TARS::STRING,new SKeyStatus());
	}
}

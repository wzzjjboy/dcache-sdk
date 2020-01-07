<?php

namespace alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\classes;

class Data extends \TARS_Struct {
	const K = 1;
	const V = 2;
	const EXPIRETIMESECOND = 3;
	const DIRTY = 4;
	const BISONLYKEY = 5;


	public $k; 
	public $v; 
	public $expireTimeSecond= 0; 
	public $dirty= true; 
	public $bIsOnlyKey= false; 


	protected static $_fields = array(
		self::K => array(
			'name'=>'k',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
		self::V => array(
			'name'=>'v',
			'required'=>true,
			'type'=>\TARS::STRUCT,
			),
		self::EXPIRETIMESECOND => array(
			'name'=>'expireTimeSecond',
			'required'=>true,
			'type'=>\TARS::UINT32,
			),
		self::DIRTY => array(
			'name'=>'dirty',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
		self::BISONLYKEY => array(
			'name'=>'bIsOnlyKey',
			'required'=>true,
			'type'=>\TARS::BOOL,
			),
	);

	public function __construct() {
		parent::__construct('DCache_merchantCenterProxyServer_ProxyObj_Data', self::$_fields);
		$this->k = new SKey();
		$this->v = new SValue();
	}
}

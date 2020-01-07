<?php


namespace alan\dcache_helper;

use alan\dcache_helper\TarsClient\DCache\merchantCenterProxyServer\ProxyObj\ProxyServant;

/**
 * Class Face
 * @package App\Helper
 * @method  DCacheHelper order()
 * @method  DCacheHelper orderItem()
 * @method  DCacheHelper invoice()
 * @method  DCacheHelper invoiceItem()
 * @method  DCacheHelper merchantInvoice()
 * @method  DCacheHelper userInvoice()
 * @method  DCacheHelper taxInvoice()
 * @method  DCacheHelper relBusinessOrderInvoice()
 * @method  DCacheHelper relBusinessUserInvoice()
 */
class DCacheHelperFace {

    /**
     * @var DCacheHelper
     */
    private $helper;

    /**
     * @var Config
     */
    private static $config;

    /**
     * @var Config
     * @return DCacheHelperFace
     */

    public static function instance(Config $config)
    {   static $instance;
        if (empty($instance)){
            $instance = new self();
            self::$config = $config;
        }
        return $instance;
    }

    private static function getConnection()
    {
        $config = new \Tars\client\CommunicatorConfig();
        $config->setSocketMode(self::$config->getSocketMode());
        $config->setLocator(self::$config->getLocator());
        $config->setServantName(self::$config->getDcacheServant());
        return new ProxyServant($config);
    }


    public function withHelper(DCacheHelper $helper)
    {
        $this->helper = $helper;
        return $this;
    }

    public function getHelper()
    {
        $start = microtime(true);
        $helper = new DCacheHelper();
        $connection = self::getConnection();
        $cost = microtime(true) - $start;
        echo "connection cost {$cost} \n";
        $helper->connect = $connection;
        return $helper;
    }

    public  function __call($name, $arguments) {
        if(empty($modules = self::$config->getModuleName($name))){
            throw new \Exception("无效的模块名");
        }

        if (empty($this->helper)){
            throw new \Exception("无效的连结");
        }
        $helper = $this->helper;
        $helper->setModuleName($modules);
        return $helper;
    }


}
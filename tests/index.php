<?php


use alan\dcache_helper\CoroutineHelper;
use alan\dcache_helper\DCacheHelperFace;

require "../vendor/autoload.php";

$cnf = [
    'dcache_invoice_locator' => 'tars.tarsregistry.QueryObj@tcp -h 10.21.32.13 -p 17890',//dcache_locator主控
    'tars_dacache_proxy' => "DCache.centerProxyServer.ProxyObj",
    'modules' => [
        'order'                     => 'center2order',
        'orderItem'                 => 'center2orderItem',
        'invoice'                   => 'center2invoice',
        'invoiceItem'               => 'center2invoiceItem',
        'merchantInvoice'           => 'center2relMerchantInvoice',
        'invoiceDeliver'            => 'center2invoiceDeliver',
        'relBusinessOrderInvoice'   => 'center2relBussinessOrderInvoice',
        'relBusinessUserInvoice'    => 'center2relBussinessUserInvoice',
        'taxInvoice'                => 'center2relTaxInvoice',
        'userInvoice'               => 'center2relUserInvoice',
    ],
];

$order_sn = '6550307913561455313';
$type = 1;

if ($type == 0) {
    $start = microtime(true);
    $config = new \alan\dcache_helper\Config($cnf['dcache_invoice_locator'], 2, $cnf['modules'], $cnf['tars_dacache_proxy']);
    $face = DCacheHelperFace::instance($config);
    $helper = $face->getHelper();
    $result = $merchantInvoice = $face->withHelper($helper)->order()->get($order_sn);
    $merchantInvoice = $face->withHelper($helper)->orderItem()->get($order_sn);
    print_r($result);
    print_r($merchantInvoice);
    $cost = microtime(true) - $start;
    echo "all cost {$cost} \n";
} else {
    go(function () use ($cnf, $order_sn){
        $config = new \alan\dcache_helper\Config($cnf['dcache_invoice_locator'], 3, $cnf['modules'], $cnf['tars_dacache_proxy']);
        $face = DCacheHelperFace::instance($config);
        $helper = $face->getHelper();
        $start = microtime(true);
        $coroutine = new CoroutineHelper();
        $coroutine->add(function() use ($face, $helper, $order_sn){
            $merchantInvoice = $face->withHelper($helper)->order()->get($order_sn);
            return [1, $merchantInvoice];
        });

        $coroutine->add(function() use ($face, $helper, $order_sn){
            $merchantInvoice = $face->withHelper($helper)->orderItem()->get($order_sn);
            return [2, $merchantInvoice];
        });
        $result = $coroutine->run();
        print_r($result);
    });
}

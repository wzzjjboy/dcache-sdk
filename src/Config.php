<?php


namespace alan\dcache_helper;


class Config {
    private $locator;

    private $socketMode = 2;

    private $moduleName;

    private $dcacheServant;
    /**
     * @var string
     */
    private $charset = 'UTF-8';

    public function __construct(string $locator, int $socketMode, array $modulesName, $dcacheServant) {
        $this->locator = $locator;
        $this->socketMode = $socketMode;
        $this->locator = $locator;
        $this->moduleName = $modulesName;
        $this->dcacheServant = $dcacheServant;
    }


    /**
     * @return mixed
     */
    public function getLocator() {
        return $this->locator;
    }

    /**
     * @param mixed $locator
     */
    public function setLocator($locator) {
        $this->locator = $locator;
    }

    /**
     * @return mixed
     */
    public function getSocketMode() {
        return $this->socketMode;
    }

    /**
     * @param mixed $socketMode
     */
    public function setSocketMode($socketMode) {
        $this->socketMode = $socketMode;
    }

    /**
     * @param null $mName
     * @return mixed
     */
    public function getModuleName($mName = null) {
        return $this->moduleName[$mName] ?? $this->moduleName;
    }

    /**
     * @param mixed $moduleName
     */
    public function setModuleName($moduleName) {
        $this->moduleName = $moduleName;
    }

    /**
     * @return mixed
     */
    public function getDcacheServant() {
        return $this->dcacheServant;
    }

    /**
     * @param mixed $dcacheServant
     */
    public function setDcacheServant($dcacheServant) {
        $this->dcacheServant = $dcacheServant;
    }

    public function getCharset() {
        return $this->charset;
    }

    /**
     * @param string $charset
     */
    public function setCharset($charset) {
        $this->charset = $charset;
    }
}
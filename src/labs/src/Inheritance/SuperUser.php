<?php

namespace ZendOopCourse\Labs\Inheritance;

use ZendOopCourse\Labs\Inheritance\BaseUser;

class SuperUser extends BaseUser
{
    protected array $software = [];

    public function installSoftware(string $pkgName, callable $callback) {
        $this->software[strtolower($pkgName)] = $callback;
    }

    public function uninstallSoftware(string $pkgName)
    {
		if (empty($this->software[strtolower($pkgName)])) {
            echo $pkgName . ' was not found on this device.';
        } else {
            unset($this->software[strtolower($pkgName)]);
        }
    }

    public function getSoftware(string $key)
    {
        return $this->software[strtolower($key)] ?? NULL;
    }

    public function runSoftware(string $key, string $params)
    {
        if (isset($this->software[strtolower($key)])) {
			return $this->software[strtolower($key)]($params);
		} else {
			return NULL;
		}
    }
}

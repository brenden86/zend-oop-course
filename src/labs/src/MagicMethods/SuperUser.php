<?php

namespace ZendOopCourse\Labs\MagicMethods;

use ZendOopCourse\Labs\MagicMethods\BaseUser;

class SuperUser extends BaseUser
{
    protected array $software = [];

    public function installSoftware(string $pkgName) {
        $package = strtolower($pkgName); // only dealing with lowercase in logic
        if (in_array($package, $this->software)) {
            echo $pkgName . ' is already installed.';
        } else {
            $this->software[] = strtolower($pkgName);
        }
    }

    public function uninstallSoftware(string $pkgName)
    {
        $package = strtolower($pkgName); // only dealing with lowercase in logic
        if (!in_array($package , $this->software)) {
            echo $pkgName . ' was not found on this device.';
        } else {
            unset($this->software[array_search($package, $this->software)]);
        }
    }

    public function getSoftware()
    {
        return $this->software;
    }
}
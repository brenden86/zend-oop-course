<?php
namespace ZendOopCourse\Labs\TypeHinting;

class SuperUser extends BaseUser
{

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

    public function runSoftware(string $key, mixed $params)
    {
        if (isset($this->software[strtolower($key)])) {
            return $this->software[strtolower($key)]($params);
        } else {
            return NULL;
        }
    }

    public function getUserInfo(): array
    {
        return [
            'name' => $this->getFullName(),
            'username' => $this->username,
            'created_on' => $this->createDate->format('M j, Y'),
            'user_type' => $this->getUserClassification(),
            'installed_software' => count($this->software)
        ];
    }

}
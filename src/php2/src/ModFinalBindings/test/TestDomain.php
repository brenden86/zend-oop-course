<?php
namespace src\ModFinalBindings\test;

use OrderApp\Core\Service\Services;
use OrderApp\Core\Db\ {Db, AbstractModel};
use PHPUnit\Framework\TestCase;

/**
 * Unit test for OrderApp\Core\Service\Services
 * To run the test:
 *     cd /home/vagrant/Zend/workspaces/DefaultWorkspace/php2 
 *     vendor/bin/phpunit src/ModFinalBindings/test/TestDomain.php
 */
class TestDomain extends TestCase
{
    public function setUp() : void
    {
        define('BASE', realpath(__DIR__ . '/../../../../orderapp'));
    }
    public function testDomainHasServices() 
    {
        // Get the service instance
        $serviceLocator = Services::getInstance();

        // Make an instance of domain
        $domain = $serviceLocator->getDomain();

        // Ensure the services dependency is available
        $services = null;
        $services = $domain->getServices();
        $this->assertNotEmpty($services);
        $this->assertInstanceOf(Services::class, $services, 'Invalid instance');
    }
}

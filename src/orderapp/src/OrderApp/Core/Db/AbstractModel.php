<?php
namespace OrderApp\Core\Db;
use OrderApp\Core\Service\Services;
use OrderApp\Core\Service\ServicesInterface;
/**
 * Abstract Db Class
 */
abstract class AbstractModel implements ModelInterface
{
    const ERROR_LOG = 'db_error.log';
    protected $db;
    /**
     * AbstractModel constructor.
     * @param Services $services
     */
    public function __construct(
        protected ServicesInterface $services
    )
    {
        $this->services = $services;
        //Get the singleton PDO and cache it so all models have it.
        $this->db = $this->services->getDb();
    }
}

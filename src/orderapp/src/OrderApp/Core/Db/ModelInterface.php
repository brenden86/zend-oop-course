<?php
namespace OrderApp\Core\Db;
use OrderApp\Core\Service\ServicesInterface;
/**
 * Db Interface
 */
interface ModelInterface
{
    public function __construct(ServicesInterface $services);
}

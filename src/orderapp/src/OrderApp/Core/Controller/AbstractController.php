<?php
/**
 * Abstract Controller
 */
namespace OrderApp\Core\Controller;
use OrderApp\Core\Service\ServicesInterface;
abstract class AbstractController implements ControllerInterface
{
    protected $domain;

    /**
     * AbstractController constructor.
     */
    public function __construct(
        protected ServicesInterface $services
    ){
        //Add the business logic container object
        $this->domain = $this->services->getDomain();
    }

    /**
     * @return mixed
     */
    public function getServices()
    {
        return $this->services;
    }

    /**
     * @param $method
     * @param null $params
     */
    public function __call($method, $params = null)
    {
        $methodName = strtolower($method) . 'Action';
        if($params){
            $this->$methodName($params);
        } else {
            $this->$methodName();
        }
    }
}

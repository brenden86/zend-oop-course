<?php
/**
 * EventEntity.php
 */
class EventEntity
{
    protected $id, $name, $startdate, $enddate;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function getStartdate()
    {
        return $this->startdate;
    }

    public function setStartdate($startdate): void
    {
        $this->startdate = $startdate;
    }

    public function getEnddate()
    {
        return $this->enddate;
    }

    public function setEnddate($enddate): void
    {
        $this->enddate = $enddate;
    }
}
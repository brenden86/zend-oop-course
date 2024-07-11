<?php
/**
 * RegistrantEntity.php
 */
class RegistrantEntity
{
    protected $id, $firstname, $lastname;
    public function __construct(string $firstname, string $lastname)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function getId()
    {
        return $this->id;
    }
}
<?php
/**
 * RegistrationEntity.php
 */
class RegistrationEntity {
    protected $id, $eventEntity, $userEntity, $registrationTime;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getEventEntity()
    {
        return $this->eventEntity;
    }

    public function setEvent($eventEntity): void
    {
        $this->eventEntity = $eventEntity;
    }

    public function getUserEntity()
    {
        return $this->userEntity;
    }

    public function setUserEntity($userEntity): void
    {
        $this->userEntity = $userEntity;
    }

    public function getRegistrationTime()
    {
        return $this->registrationTime;
    }

    public function setRegistrationTime($registrationTime): void
    {
        $this->registrationTime = $registrationTime;
    }
}
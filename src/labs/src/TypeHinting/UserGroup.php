<?php
namespace ZendOopCourse\Labs\TypeHinting;

use Exception;

class UserGroup
{

    public string $groupName;
    public $owner;
    protected array $members = [];

    public function __construct(
        string $groupName,
        UserInterface $owner
    ) {
        $this->groupName = $groupName;
        $this->owner = $this->setOwner($owner);
        $this->addMember($owner);
    }

    protected function setOwner(UserInterface $owner)
    {
        // Owner must be at least a SuperUser
        if ($owner instanceof SuperUser) {
            $this->owner = $owner;
        } else {
            throw new Exception('User must be at least a SuperUser');
        }
    }

    public function getMembers(): array
    {
        return $this->members;
    }

    public function addMember(UserInterface $user)
    {
        $this->members[$user->username] = $user->username;
    }

    public function removeMember(string $username)
    {
        if (isset($this->members[$username])) {
            unset($this->members[$username]);
        } else {
            throw new Exception('User ' . $username . ' not found in this group.');
        }
    }
}
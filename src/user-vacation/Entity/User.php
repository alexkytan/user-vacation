<?php

namespace UserVacation\Entity;

/**
 * Class User
 * @package UserVacation\Entity
 *
 * I added this class for example.
 * This class should be in client code, because we are adding additional logic to application
 * and we supposed that User class already exists.
 */
class User extends Entity
{
    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $second_name;

    public function __construct(
        int $id,
        string $email,
        string $first_name,
        string $second_name
    ) {
        $this->id = $id;
        $this->email = $email;
        $this->first_name = $first_name;
        $this->second_name = $second_name;
    }
}
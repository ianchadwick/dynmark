<?php namespace Dynmark;

use Dynmark\Commands\Command;

class Dynmark {

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $password;

    /**
     * Init with the username and password
     *
     * @param $username string
     * @param $password string
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Execute command
     *
     * @param $command
     * @return mixed
     */
    public function fire(Command $command)
    {
        $command->setCredentials($this->username, $this->password);
        return $command->fire();
    }
}
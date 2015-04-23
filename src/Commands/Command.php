<?php namespace Dynmark\Commands;

use Dynmark\Dynmark;

abstract class Command {

    /**
     * @var Dynmark
     */
    private $dynmark;

    /**
     * @param Dynmark $dynmark
     */
    public function __construct(Dynmark $dynmark)
    {
        $this->dynmark = $dynmark;
    }

    /**
     * @return mixed
     */
    public function fire()
    {
        return $this->dynmark->fire($this);
    }

    /**
     * Get the payload for the command
     *
     * @return array
     */
    abstract public function getPayload();

    /**
     * Get the method for the command
     *
     * @return string
     */
    abstract public function getMethod();
}
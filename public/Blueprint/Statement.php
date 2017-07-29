<?php
namespace Cable\Ordm\Blueprint;

class Statement
{

    /**
     * @var string
     */
    private $state;

    /**
     * @return string
     */
    public function getState() : string
    {
        return $this->state;
    }

    /**
     * @param string $state
     * @return Statement
     */
    public function setState(string $state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * @return string
     */
    public function __toString()
    {
       return $this->getState();
    }
}

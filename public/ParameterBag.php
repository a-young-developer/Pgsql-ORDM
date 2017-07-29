<?php

class ParameterBag
{

    /**
     * @var array
     */
    private $parameters;

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     * @return ParameterBag
     */
    public function setParameters(array $parameters): ParameterBag
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @param string|int $name
     * @return mixed
     */
    public function get($name){
        return $this->parameters[$name];
    }

    /**
     * @param  string|int $name
     * @return mixed
     */
    public function has($name){
        return $this->parameters[$name];
    }

    /**
     * @param string|int $name
     * @param mixed $value
     * @return $this
     */
    public function set($name, $value){
        $this->parameters[$name] = $value;

        return $this;
    }
}

<?php

namespace Bayer\JsonApi\Error;

/**
 * Class Source
 *
 * @link http://jsonapi.org/format/#errors
 * @package Bayer\JsonApi\Error
 */
class Source
{
    /**
     * @var string|null
     */
    protected $pointer;

    /**
     * @var string|null
     */
    protected $parameter;

    /**
     * @return null|string
     */
    public function getPointer()
    {
        return $this->pointer;
    }

    /**
     * @param null|string $pointer
     */
    public function setPointer($pointer)
    {
        $this->pointer = $pointer;
    }

    /**
     * @return null|string
     */
    public function getParameter()
    {
        return $this->parameter;
    }

    /**
     * @param null|string $parameter
     */
    public function setParameter($parameter)
    {
        $this->parameter = $parameter;
    }
}
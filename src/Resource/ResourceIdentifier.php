<?php

namespace Bayer\JsonApi\Resource;
use Bayer\JsonApi\MetaTrait;

/**
 * Class ResourceIdentifier
 *
 * @link http://jsonapi.org/format/#document-structure-resource-identifier-objects
 * @package Bayer\JsonApi
 */
class ResourceIdentifier
{
    use MetaTrait;

    /**
     * @var string
     */
    protected $id;

    /**
     * @var string
     */
    protected $type;

    /**
     * @param string $id
     * @param string $type
     */
    public function __construct($id, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }
}
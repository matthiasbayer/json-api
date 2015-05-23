<?php

namespace Bayer\JsonApi\Resource;
use Bayer\JsonApi\Link\LinkTrait;
use Bayer\JsonApi\MetaTrait;
use Bayer\JsonApi\Relationship;

/**
 * Class ResourceObject
 *
 * @link http://jsonapi.org/format/#document-structure-resource-objects
 * @package Bayer\JsonApi
 */
class ResourceObject
{
    use MetaTrait;
    use LinkTrait;

    /**
     * Identifier for this object. Not required when the resource object originates at the client and represents
     * a new resource to be created on the server.
     *
     * @var string|null
     */
    protected $id;

    /**
     * Used to describe resource objects that share common attributes and relationships.
     * Each resource object's "type" and "id" pair MUST identify a single, unique resource.
     *
     * @var string
     */
    protected $type;

    /**
     * Some of the resource's data.
     *
     * @var array|null
     */
    protected $attributes;

    /**
     * Relationships between the resource and other JSON API resources.
     *
     * @var Relationship[]|null
     */
    protected $relationships;

    /**
     * @param null|string $id
     * @param string $type
     */
    public function __construct($id = null, $type)
    {
        $this->id = $id;
        $this->type = $type;
    }

    /**
     * @return null|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null|string $id
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

    /**
     * @return array|null
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * @param array|null $attributes
     */
    public function setAttributes($attributes)
    {
        $this->attributes = null;

        foreach ($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }
    }

    /**
     * @param $name
     * @return string|array|null
     */
    public function getAttribute($name)
    {
        if (isset($this->attributes[$name])) {
            return $this->attributes[$name];
        }

        return null;
    }

    /**
     * @param string $name
     * @param string|array $value
     */
    public function setAttribute($name, $value)
    {
        if (is_array($value)) {
            /**
             * @link http://jsonapi.org/format/#document-structure-resource-attributes
             * Complex data structures MUST reserve the relationships and links members for future use.
             */
            if (!empty($value['relationships']) || !empty($value['links'])) {
                throw new \InvalidArgumentException("Complex data structures must not contain 'relationships' and 'links' members.");
            }
        }

        if (isset($this->relationships[$name])) {
            throw new \InvalidArgumentException("Attribute name '$name' is invalid as a relationship with the same name already exists'");
        }

        if (null === $this->attributes) {
            $this->attributes = array();
        }

        $this->attributes[$name] = $value;
    }

    /**
     * @return Relationship[]
     */
    public function getRelationships()
    {
        return $this->relationships;
    }

    /**
     * @param string $name
     * @return Relationship|null
     */
    public function getRelationship($name)
    {
        if (isset($this->relationships[$name])) {
            return $this->relationships[$name];
        }

        return null;
    }

    /**
     * @param string $name
     * @param Relationship $value
     */
    public function setRelationship($name, Relationship $value)
    {
        if (isset($this->attributes[$name])) {
            throw new \InvalidArgumentException("Relationship name '$name' is invalid as an attribute with the same name already exists'");
        }

        if (null === $this->relationships) {
            $this->relationships = array();
        }

        $this->relationships[$name] = $value;
    }

    /**
     * @param Relationship[] $relationships
     */
    public function setRelationships(array $relationships)
    {
        $this->relationships = null;

        foreach ($relationships as $name => $value) {
            $this->setRelationship($name, $value);
        }
    }

    /**
     * @param string $name
     * @return bool
     */
    public function removeRelationship($name)
    {
        if (isset($this->relationships[$name])) {
            unset($this->relationships[$name]);

            return true;
        }

        return false;
    }
}
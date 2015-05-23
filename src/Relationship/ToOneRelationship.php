<?php

namespace Bayer\JsonApi\Relationship;

use Bayer\JsonApi\Resource\ResourceIdentifier;

/**
 * Class ToOneRelationship
 *
 * @link http://jsonapi.org/format/#document-structure-resource-objects-relationships
 * @package Bayer\JsonApi\Relationship
 */
class ToOneRelationship extends AbstractRelationship
{
    /**
     * @var ResourceIdentifier|null
     */
    protected $data;

    /**
     * @return ResourceIdentifier|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param ResourceIdentifier|null $data
     */
    public function setData($data = null)
    {
        if (!$data instanceof ResourceIdentifier && !null === $data) {
            throw new \InvalidArgumentException("Data must be instance of ResourceIdentifier or null");
        }

        $this->data = $data;
    }

    /**
     * Clear all data
     */
    public function clearData()
    {
        $this->setData(null);
    }
}
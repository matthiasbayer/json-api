<?php

namespace Bayer\JsonApi\Relationship;

use Bayer\JsonApi\Resource\ResourceIdentifier;

/**
 * Class ToManyRelationship
 *
 * @link http://jsonapi.org/format/#document-structure-resource-objects-relationships
 * @package Bayer\JsonApi\Relationship
 */
class ToManyRelationship extends AbstractRelationship
{
    /**
     * @var ResourceIdentifier[]|array
     */
    protected $data = array();

    /**
     * @return ResourceIdentifier[]|array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param ResourceIdentifier|array $data
     */
    public function setData($data)
    {
        $this->data = array();

        foreach ($data as $resource) {
            $this->addData($resource);
        }
    }

    /**
     * Clear all data
     */
    public function clearData()
    {
        $this->setData(array());
    }

    /**
     * @param ResourceIdentifier $data
     */
    public function addData(ResourceIdentifier $data)
    {
        $this->data[] = $data;
    }

    /**
     * @param ResourceIdentifier $data
     * @return bool
     */
    public function removeData(ResourceIdentifier $data)
    {
        $key = array_search($data, $this->data, true);

        if ($key !== false) {
            unset($this->data[$key]);

            return true;
        }

        return false;
    }

    /**
     * @param ResourceIdentifier $data
     * @return bool
     */
    public function hasData(ResourceIdentifier $data)
    {
        return in_array($data, $this->data);
    }
}
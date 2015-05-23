<?php

namespace Bayer\JsonApi\Document;

use Bayer\JsonApi\Resource\ResourceIdentifier;
use Bayer\JsonApi\Resource\ResourceObject;

/**
 * Class CollectionDocument
 *
 * @link http://jsonapi.org/format/#document-structure-top-level
 * @package Bayer\JsonApi\Document
 */
class CollectionDocument extends AbstractDocument
{
    /**
     * The documents primary data
     *
     * @var ResourceObject[]|ResourceIdentifier[]|array
     */
    protected $data = array();

    /**
     * {@inheritdoc}
     */
    public function setErrors($errors)
    {
        // A document containing errors must not have primary data
        if (null !== $errors) {
            $this->clearData();
        }

        parent::setErrors($errors);
    }

    /**
     * @return ResourceObject[]|ResourceIdentifier[]|array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param ResourceObject[]|ResourceIdentifier[]|array $data
     */
    public function setData($data)
    {
        $this->data = array();

        foreach ($data as $resource) {
            $this->addData($resource);
        }
    }

    /**
     * @param ResourceObject|ResourceIdentifier $data
     */
    public function addData($data)
    {
        if (!$data instanceof ResourceObject && !$data instanceof ResourceIdentifier) {
            throw new \InvalidArgumentException("Data must be a ResourceObject or ResourceIdentifier");
        }

        $this->data[] = $data;
    }

    /**
     * @param ResourceObject|ResourceIdentifier $data
     * @return bool
     */
    public function hasData($data)
    {
        return in_array($data, $this->data);
    }

    /**
     * @param ResourceObject|ResourceIdentifier $data
     * @return bool
     */
    public function removeData($data)
    {
        $key = array_search($data, $this->data, true);

        if ($key !== false) {
            unset($this->data[$key]);

            return true;
        }

        return false;
    }

    /**
     * Clear all data
     */
    public function clearData()
    {
        $this->setData(array());
    }
}
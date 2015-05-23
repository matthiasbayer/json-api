<?php

namespace Bayer\JsonApi\Document;

use Bayer\JsonApi\AbstractDocument;
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
     * @var ResourceObject[]|ResourceIdentifier[]|null
     */
    protected $data;

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
     * @return ResourceObject[]|ResourceIdentifier[]|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param ResourceObject[]|ResourceIdentifier[]|null $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

    /**
     * @param ResourceObject|ResourceIdentifier $data
     */
    public function addData($data)
    {
        if (!$data instanceof ResourceObject && !$data instanceof ResourceIdentifier) {
            throw new \InvalidArgumentException("Data must be a ResourceObject or ResourceIdentifier");
        }

        if ($this->data === null) {
            $this->data = array();
        }

        $this->data[] = $data;
    }

    /**
     * Clear all data
     */
    public function clearData()
    {
        $this->setData(null);
    }
}
<?php

namespace Bayer\JsonApi\Document;

use Bayer\JsonApi\Error;
use Bayer\JsonApi\Resource\ResourceIdentifier;
use Bayer\JsonApi\Resource\ResourceObject;

/**
 * Class ResourceDocument
 *
 * @link http://jsonapi.org/format/#document-structure-top-level
 * @package Bayer\JsonApi\Document
 */
class ResourceDocument extends AbstractDocument
{
    /**
     * The documents primary data
     *
     * @var ResourceObject|ResourceIdentifier|null
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
     * @return ResourceIdentifier|ResourceObject|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param ResourceIdentifier|ResourceObject|null $data
     * @throws \InvalidArgumentException
     */
    public function setData($data)
    {
        // A document containing data must not have errors
        if (null !== $data) {
            $this->clearErrors();
        }

        if (!$data instanceof ResourceIdentifier && !$data instanceof ResourceObject && !null === $data) {
            throw new \InvalidArgumentException("Data must be a ResourceIdentifier, ResourceObject or null");
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
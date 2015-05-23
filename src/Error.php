<?php

namespace Bayer\JsonApi;
use Bayer\JsonApi\Error\Source;

/**
 * Class Error
 *
 * @link http://jsonapi.org/format/#errors
 * @package Bayer\JsonApi
 */
class Error
{
    use MetaObject;

    /**
     * A unique identifier for this particular occurrence of the problem.
     *
     * @var int|string|null
     */
    protected $id;

    /**
     * A URI that MAY yield further details about this particular occurrence of the problem.
     *
     * @var string|null
     */
    protected $href;

    /**
     * The HTTP status code applicable to this problem, expressed as a string value.
     *
     * @var string|null
     */
    protected $status;

    /**
     * An application-specific error code, expressed as a string value.
     *
     * @var string|null
     */
    protected $code;

    /**
     * A short, human-readable summary of the problem. It SHOULD NOT change from occurrence to occurrence of the
     * problem, except for purposes of localization.
     *
     * @var string|null
     */
    protected $title;

    /**
     * A human-readable explanation specific to this occurrence of the problem.
     *
     * @var string|null
     */
    protected $detail;

    /**
     * An object containing references to the source of the error
     *
     * @var Source[]
     */
    protected $source;

    /**
     * @return int|null|string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null|string $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return null|string
     */
    public function getHref()
    {
        return $this->href;
    }

    /**
     * @param null|string $href
     */
    public function setHref($href)
    {
        $this->href = $href;
    }

    /**
     * @return null|string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param null|string $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @return null|string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param null|string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return null|string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param null|string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return null|string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @param null|string $detail
     */
    public function setDetail($detail)
    {
        $this->detail = $detail;
    }

    /**
     * @return Source[]
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param Source[] $source
     */
    public function setSource(array $source)
    {
        $this->source = $source;
    }

    /**
     * @param Source $source
     */
    public function addSource(Source $source)
    {
        $this->source[] = $source;
    }

    /**
     * @param Source $source
     * @return bool
     */
    public function hasSource(Source $source)
    {
        return in_array($source, $this->source);
    }

    /**
     * @param Source $source
     * @return bool
     */
    public function removeSource(Source $source)
    {
        $key = array_search($source, $this->source, true);

        if ($key !== false) {
            unset($this->source[$key]);

            return true;
        }

        return false;
    }
}
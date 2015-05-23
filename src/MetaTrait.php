<?php

namespace Bayer\JsonApi;

trait MetaTrait
{
    /**
     * @var array|null
     */
    protected $meta;

    /**
     * @param string|null $name
     * @return array|null
     */
    public function getMeta($name = null)
    {
        if (null === $name) {
            return $this->meta;
        }

        if (isset($this->meta[$name])) {
            return $this->meta[$name];
        }

        return null;
    }

    /**
     * @param array|null $meta
     */
    public function setMeta(array $meta)
    {
        $this->meta = $meta;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function addMeta($name, $value)
    {
        $this->meta[$name] = $value;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function removeMeta($name)
    {
        if (isset($this->meta[$name])) {
            $removed = $this->meta[$name];
            unset($this->meta[$name]);

            return $removed;
        }

        return null;
    }
}
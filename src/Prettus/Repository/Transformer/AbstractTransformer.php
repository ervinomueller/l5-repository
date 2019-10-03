<?php

namespace Prettus\Repository\Transformer;

use Illuminate\Database\Eloquent\Model;
use League\Fractal\Resource\Collection;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\NullResource;

/**
 * Class AbstractTransformer
 *
 * @package Prettus\Repository\Transformer
 * @author Ervino Mueller <ervinomueller@outlook.com>
 */
abstract class AbstractTransformer
{
    /**
     * @param $data
     * @param null $transformer
     * @param bool $resourceKey
     * @return Item|NullResource
     */
    public function maybeItem($data, $transformer = null, $resourceKey = false)
    {
        if ($transformer === null) {
            if ($data instanceof Model) {
                $transformer = new ModelTransformer;
            } elseif (is_array($data)) {
                $transformer = new ArrayTransformer;
            }
        }

        return $data ? $this->item($data, $transformer, $resourceKey) : $this->null();
    }

    /**
     * @param $data
     * @param null $transformer
     * @param bool $resourceKey
     * @return Collection|NullResource
     */
    public function maybeCollection($data, $transformer = null, $resourceKey = false)
    {
        return $data ? $this->collection($data, $transformer, $resourceKey) : $this->null();
    }
}

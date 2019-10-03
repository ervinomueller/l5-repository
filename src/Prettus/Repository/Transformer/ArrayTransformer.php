<?php

namespace Prettus\Repository\Transformer;

use League\Fractal\TransformerAbstract;

/**
 * Class ArrayTransformer
 *
 * @package Prettus\Repository\Transformer
 * @author Ervino Mueller <ervinomueller@outlook.com>
 */
class ArrayTransformer extends TransformerAbstract
{
    /**
     * @param $arrayable
     * @return mixed
     */
    public function transform($arrayable)
    {
        return $arrayable;
    }
}

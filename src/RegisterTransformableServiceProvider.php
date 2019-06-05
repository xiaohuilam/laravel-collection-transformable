<?php

namespace Xiaohuilam\LaravelCollectionTransformable;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Collection;

/**
 * 集合转换器
 */
class RegisterTransformableServiceProvider extends ServiceProvider
{
    /**
     * 注册
     *
     * @return void
     */
    public function register()
    {
        Collection::macro('setTransformer', function ($transformer) {
            /**
             * @var Collection $collection
             */
            $collection = $this;
            $collection->transform(function ($item, $key) use ($collection, $transformer) {
                $transform = new $transformer($collection);
                $transformed = $transform->transform($item, $key);

                return $transformed;
            });
        });
    }
}

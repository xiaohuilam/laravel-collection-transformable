# Laravel-collection-transformable

Collection transformer setter. `collect()->setTransformer(WonderfulTransformer::class);`

## Installation
```
composer require xiaohuilam/laravel-collection-transformable
```

## Usage

define your transformer class:
```php
namespace App\Http\Transformers;

class TestTransformer
{
    public function transform($item)
    {
        return [
            'id' => $item->id,
        ];
    }
}
```
then, set transformer as it.
```php
$collection = collect([]);
$collection->setTransformer(App\Http\Transformers\TestTransformer::class);
dd($collection);
```

It outputs
```bash
Illuminate\Support\Collection {#796
  #items: array:2 [
    0 => array:1 [
      "id" => 1
    ]
    1 => array:1 [
      "id" => 2
    ]
  ]
}
>>>
```

## License
MIT
# RedminSchema

A very simplified database structure for use with Laravel.

## How to use

```bash
composer required redooor/redminschema
```

Then create your own class:

```php
<?php

namespace Redooor\Redmincalculator\Models;

use Redooor\Redminschema\Models\Asset;
use Illuminate\Database\Eloquent\Builder;

class Category extends Asset
{
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'document' => array, // You can create your own Cast here
        ];
    }

    /**
     * Query is scoped to specific schema type.
     */
    protected static function booted(): void
    {
        static::addGlobalScope('schema', function (Builder $builder) {
            $builder->where('schema', 'schema.type.category');
        });

        static::creating(function (Asset $content) {
            $content->uuid = self::findUniqueId();
            $content->schema = "schema.type.category";
        });
    }
}
```

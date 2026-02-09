<?php

declare(strict_types=1);

namespace Core\Eloquent;

use Core\Traits\HasAttribute;
use Core\Traits\HasCRUD;
use Core\Traits\HasQueryBuilder;

abstract class Model
{
    use HasQueryBuilder, HasCRUD, HasAttribute;

    protected string $table;

    protected array $fillable = [];

    protected string $primaryKey;

    protected array $hidden = [];

    protected array $casts = [];

    protected string $createdAt;

    protected string $updatedAt;

    protected array $collection;
}
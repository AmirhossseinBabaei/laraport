<?php

declare(strict_types=1);

namespace Core\Eloquent;

abstract class Model
{
    protected string $table;

    protected array $fillables;

    protected string $primaryKey;

    protected array $hidden = [];

    protected array $casts = [];

    protected string $createdAt;

    protected string $updatedAt;

    protected string $collection;
}
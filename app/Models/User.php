<?php

namespace App\Models;

use Core\Eloquent\Model;
use Core\Traits\HasAttribute;
use Core\Traits\HasCRUD;
use Core\Traits\HasQueryBuilder;

class User extends Model
{
    protected string $table = "users";
    protected string $primaryKey = "id";
    protected string $createdAt = 'created_at';
    protected string $updatedAt = 'updated_at';
    protected array $fillable = [];
}
<?php

namespace App\Models;

use Core\Eloquent\Model;

class User extends Model
{
    protected string $table = "users";
    protected string $createdAt = 'created_at';
    protected string $updatedAt = 'updated_at';
    protected array $fillables = [];
}
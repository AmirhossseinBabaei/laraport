<?php

declare(strict_types=1);

namespace Core\Traits;

use Core\Database\Database;

trait HasCRUD
{
    public function setFillables(array $array): string
    {
        $fillable = [];

        foreach ($this->fillables as $attribute) {
            $fillable = $attribute . " = ? ";
            $this->setValues(['key' => $attribute, $array[$attribute]]);
        }

        return implode(',', $fillable);
    }

    public function insert(array $data)
    {
        $this->setSql("INSERT INTO $this->table SET $this->fillables($data)" . $this->createdAt . " = Now();");
        $this->executeQuery();
        $this->resetQuery();

        $object = $this->find((int)Database::newInsertId());
        $defaultVariables = get_class_vars(get_called_class());
        $allVariables = get_object_vars($object);
        $differentVariables = array_diff(array_keys($allVariables), array_keys($defaultVariables));

        foreach ($differentVariables as $attribute) {
            $this->$attribute = $object->$attribute;
        }

        $this->resetQuery();
        return $this;
    }

    public function find(int $id)
    {
        $this->setSql("SELECT * FROM $this->table");
        $this->setWhere('AND', $this->primaryKey . " = ?");
        $this->setValues($this->primaryKey, $id);

        $statement = $this->exequteQuery();
        $data = $statement->fetch();

        return $data;
    }

    public function update(int $id, array $data): static
    {
        $this->setSql("UPDATE $this->table SET $this->setFillables($data)" . " " . $this->createdAt = " = Now()");
        $this->setWhere('AND', $this->primaryKey . " = ?");
        $this->exequteQuery();
        $this->setValues($this->primaryKey, $id);
        $this->resetQuery();

        return $this;
    }

    public function delete(int $id): bool
    {
        $this->setSql("DELETE FROM $this->table");
        $this->setWhere('AND', $this->primaryKey . " = ?");
        $this->setValues($this->primaryKey, $id);
        $statement = $this->exequteQuery();
        $this->resetQuery();

        return (bool)$statement;
    }

    public function getAll()
    {
        $this->setSql("SELECT * FROM $this->table");
        $this->setOrderBy($this->primaryKey, "DESC");
        $statement = $this->exequteQuery();
        $data = $statement->fetchAll();
        $this->resetQuery();

        return $data ?? null;
    }

    public function where($attribute, $operator, $value): static
    {
        $this->setWhere('AND', $attribute . " " . $operator . " ?");
        $this->setValues($attribute, $value);

        return $this;
    }

    public function orderBy($attribute, $expression): static
    {
        $this->setOrderBy($attribute, $expression);
        return $this;
    }

    public function limit($offset, $number): static
    {
        $this->setLimit($offset, $number);
        return $this;
    }
}
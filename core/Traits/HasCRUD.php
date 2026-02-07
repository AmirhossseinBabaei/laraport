<?php

declare(strict_types=1);

namespace Core\Traits;

use Core\Database\Database;
use http\Exception\UnexpectedValueException;

require_once "core/Database/Database.php";

trait HasCRUD
{

    protected function setFillables(array $array): string
    {
        $fillable = [];
        foreach ($this->fillable as $attribute) {
            $fillable[] = $attribute . " = ? ";
            $this->setValues($attribute, $array[$attribute]);
        }

        return implode(',', $fillable);
    }

    public function insert(array $data)
    {
        $this->setSql("INSERT INTO $this->table SET $this->setFillables($data)," . $this->created_at . " = Now();");
        $this->executeQuery();
        $this->resetQuery();

        $object = $this->find(Database::newInsertId());
        $defaultVariables = get_class_vars(get_called_class());
        $allVariables = get_object_vars($object);
        $differentVariables = array_diff(array_keys($allVariables), array_keys($defaultVariables));

        foreach ($differentVariables as $attribute) {
            $this->$attribute = $object->$attribute;
        }

        $this->resetQuery();
        return $this;
    }

    protected function find($id)
    {
        $this->setSql('SELECT * FROM ' . $this->table);
        $this->setWhere('AND', $this->primaryKey . ' = ?');
        $this->setValue($this->primaryKey, $id);

        $statement = $this->executeQuery();
        $data = $statement->fetch();

        if ($data) {
            return $this->setAttribute($data);
        } else {
            return null;
        }
    }

    public function update(array $data, $id): static
    {
        $this->setSql('UPDATE' . $this->table . "SET" . $this->setFillables($data) . ", $this->updatedAt" . " = Now()");
        $this->setWhere('AND', $this->primaryKey . " = ?");
        $this->setValues($this->primaryKey, $id);
        $this->executeQuery();
        $this->resetQuery();
        return $this;
    }

    public function getAll()
    {
        $this->setSql("SELECT * FROM" . $this->table);
        $statement = $this->executeQuery();
        $data = $statement->fetchAll();

        if ($data) {
            $this->setObject($data);
            return $this->collection;
        } else {
            return null;
        }
    }

    public function delete($id): bool
    {
        $this->setSql("DELETE FROM " . $this->table);
        $this->setWhere("AND", $this->primaryKey . " = ?");
        $this->setValues($this->primaryKey, $id);
        $statement = $this->executeQuery();
        $this->resetQuery();

        if ($statement) {
            return true;
        } else {
            return false;
        }
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
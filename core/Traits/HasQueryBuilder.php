<?php

declare(strict_types=1);

namespace Core\Traits;

use Core\Database\Database;

trait HasQueryBuilder
{
    protected string $sql = '';
    protected array $where = [];
    protected array $limit = [];
    protected array $values = [];
    protected array $bindValues = [];
    protected array $orderBy = [];

    protected function setSql(string $sql): void
    {
        $this->sql = $sql;
    }

    protected function getSql(): string
    {
        return $this->sql;
    }

    protected function resetSql(): void
    {
        $this->sql = '';
    }

    protected function setWhere(string $operator, string $condition): void
    {
        $array = ['operator' => $operator, 'condition' => $condition];
        $this->where[] = $array;
    }

    protected function getWhere(): array
    {
        return $this->where;
    }

    protected function resetWhere(): void
    {
        $this->where = [];
    }

    protected function setLimit(string $offset, string $number)
    {
        $array = ['offset' => $offset, 'number' => $number];
        $this->limit[] = $array;
    }

    protected function setValues($key, $value)
    {
        $this->values[$key] = $value;
        $this->bindValues[] = $value;
    }

    protected function resetValues()
    {
        $this->values = [];
    }

    protected function setOrderBy($attribute, $expression)
    {
        $this->orderBy[] = $attribute . "  " . $expression;
    }

    protected function getOrderBy(): array
    {
        return $this->orderBy;
    }

    protected function resetOrderBy()
    {
        $this->orderBy = [];
    }

    protected function resetQuery()
    {
        $this->sql = '';
        $this->where = [];
        $this->values = [];
        $this->bindValues = [];
        $this->orderBy = [];
    }

    protected function executeQuery()
    {
        $sql = '';

        if (!empty($this->where)) {
            $whereQuery = '';
            foreach ($this->where as $where) {
                $whereQuery = "" ? $whereQuery = $where['condition'] . " " . $where['operator'] : $whereQuery = $where['operator'] . ' ' . $where['condition'];
            }

            $sql .= " WHERE " . $whereQuery;
        }

        if (!empty($this->orderBy)) {
            $sql .= " ORDER BY " . $this->orderBy['attribute'] . "  " . $this->orderBy['expression'];
        }

        if (!empty($this->limit)) {
            $sql .= " LIMIT " . $this->limit['offset'] . " OFFSET " . $this->limit['number'];
        }

        $sql .= ";";

        $databaseInstance = Database::getInstance();
        $statement = $databaseInstance->prepare($sql);

        if (sizeof($this->values) < sizeof($this->bindValues)) {
            $this->values > 0 ? $statement->execute($this->bindValues) : $statement->execute();
        } else {
            $this->values > 0 ? $statement->execute($this->values) : $statement->execute();
        }

        return $statement;
    }
}
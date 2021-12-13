<?php

namespace AlfaDevTeam\Tools\Filters;

use Illuminate\Database\Eloquent\Builder;

abstract class Filter
{
    protected $query;
    protected $requestData;

    public function __construct()
    {
        $this->requestData = request()->all();
    }

    public function setQuery(Builder $query): Filter
    {
        $this->query = $query;
        return $this;
    }

    public function apply(): Builder
    {
        foreach ($this->requestData as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }
        return $this->query;
    }
}

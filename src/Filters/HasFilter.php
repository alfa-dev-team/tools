<?php

namespace AlfaDevTeam\Tools\Filters;

trait HasFilter
{
    public function scopeFilter($query, Filter $filter)
    {
        return $filter->setQuery($query)->apply();
    }
}
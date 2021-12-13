<?php

namespace AlfaDevTeam\Tools\Builder;

trait HasDataTableBuilder
{
    public function newEloquentBuilder($query)
    {
        return new DataTableBuilder($query);
    }
}
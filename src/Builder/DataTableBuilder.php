<?php

namespace AlfaDevTeam\Tools\Builder;

use Illuminate\Pagination\Paginator;

class DataTableBuilder extends \Illuminate\Database\Eloquent\Builder
{
    /**
     * Paginate the given query.
     *
     * @param  int  $perPage
     * @param  array  $columns
     * @param  string  $pageName
     * @param  int|null  $page
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     *
     * @throws \InvalidArgumentException
     */
    public function datatablesPaginate($columns = ['*'], $pageName = 'page')
    {
        $perPage = request()->get('length', $this->model->getPerPage());

        $page = request()->get('start');

        $results = ($total = $this->toBase()->getCountForPagination())
            ? $this->skip($page)->take($perPage)->get($columns)
            : $this->model->newCollection();

        return $this->paginator($results, $total, $perPage, $page, [
            'path' => Paginator::resolveCurrentPath(),
            'pageName' => $pageName,
        ]);
    }
}

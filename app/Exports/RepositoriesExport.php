<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;

class RepositoriesExport implements FromArray
{
    protected $repositories;

    public function __construct(array $repositories)
    {
        $this->repositories = $repositories;
    }

    public function array(): array
    {
        return $this->repositories['items'];
    }
}

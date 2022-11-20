<?php

namespace App\Exports;

use App\Models\Version;
use Maatwebsite\Excel\Concerns\FromCollection;

class VersionsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Version::all();
    }
}

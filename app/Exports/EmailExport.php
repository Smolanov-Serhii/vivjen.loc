<?php

namespace App\Exports;

use App\Models\Module;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmailExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $email = Module::with('items', 'items.seo')->where('name', 'newsletter')->get()->map(function ($email) {
            return $email->items->map(function ($items) {
                return (object)$items->seo->title;
            });
        });

        return $email->flatten(1);
    }
}

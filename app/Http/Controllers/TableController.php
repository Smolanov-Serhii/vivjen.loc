<?php

namespace App\Http\Controllers;

use App\Classes\Calendar;
use Illuminate\Http\Request;

class TableController extends Controller
{
    public function show(Request $request)
    {
        $events = array(
            '16'    => 'Заплатить ипотеку',
            '23.02' => 'День защитника Отечества',
            '08.03' => 'Международный женский день',
            '31.12' => 'Новый год'
        );

        if ($request->has('start') && $request->has('end'))
        {
            return Calendar::getInterval(date('01.Y'), date('12.Y'), $events);
        }

        return false;
    }
}
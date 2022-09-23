<?php

namespace App\Http\Controllers;


use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CabinetController extends Controller
{
    public function addTrening(Request $request)
    {
        $payment = new \Idma\Robokassa\Payment(
            'john_doe', 'password1', 'password2', true
        );
        if (Auth::check()) {
            $attr = Module::where('name', 'clients')->first()->attrs->where('key', 'treinings-personal')->first();
            $list = Auth::user()->client->props()->where('module_attribute_id', $attr->id)->first();

            $array = json_decode($list->value);
            array_push($array, $request->get('trening'));

            $list->update([
                'value' => json_encode(array_values($array)),
                'module_attribute_id' => $attr->id
            ]);
//            strtolower(strftime("%A"))
            return view('client.block_templates.includes.my-trenings', ['weekday' => $request->get('weekday')]);
        }

        return '';
    }

    public function deleteTrening(Request $request)
    {
        if (Auth::check()) {
            $attr = Module::where('name', 'clients')->first()->attrs->where('key', 'treinings-personal')->first();
            $list = Auth::user()->client->props()->where('module_attribute_id', $attr->id)->first();

            $array = json_decode($list->value);

            if (($key = array_search($request->get('trening'), $array)) !== false) {
                unset($array[$key]);
            }

            $list->update([
                'value' => json_encode(array_values($array)),
                'module_attribute_id' => $attr->id
            ]);

            return view('client.block_templates.includes.my-trenings', ['weekday' => strtolower(strftime("%A"))]);
        }

        return '';
    }
    
    public function getFavorites()
    {
        if (Auth::check()) {
            return view('client.block_templates.includes.favorites-trenings')->render();
        }
    }

    public function addedTrenings(Request $request)
    {
        $attr = Module::where('name', 'clients')->first()->attrs->where('key', 'treinings-added')->first();
        $list = Auth::user()->client->props()->where('module_attribute_id', $attr->id)->first();

        if ($list) {
            if (is_null($list->value)) {
                $array = [];
            } else {
                $array = json_decode($list->value);
            }
            array_push($array, $request->get('trening'));

            $list->update([
                'value' => json_encode(array_values($array)),
                'module_attribute_id' => $attr->id
            ]);
        } else {
            $array = [];
            array_push($array, $request->get('trening'));

            Auth::user()->client->props()->create([
                'module_attribute_id' => $attr->id,
                'value' => json_encode(array_values($array)),
            ]);
        }

        return true;
    }

    public function deleteAddedTrenings(Request $request)
    {
        $attr = Module::where('name', 'clients')->first()->attrs->where('key', 'treinings-personal')->first();
        $list = Auth::user()->client->props()->where('module_attribute_id', $attr->id)->first();

        $array = json_decode($list->value);

        if (!empty($array)) {
            foreach ($array as $key => $item) {
                if (strstr($item, $request->get('trening').'|')) {
                    unset($array[$key]);
                }
            }

            $list->update([
                'value' => json_encode(array_values($array)),
                'module_attribute_id' => $attr->id
            ]);
        }

        $attr = Module::where('name', 'clients')->first()->attrs->where('key', 'treinings-added')->first();
        $list = Auth::user()->client->props()->where('module_attribute_id', $attr->id)->first();

        $array = json_decode($list->value);

        if (($key = array_search($request->get('trening'), $array)) !== false) {
            unset($array[$key]);
        }

        $list->update([
            'value' => json_encode(array_values($array)),
            'module_attribute_id' => $attr->id
        ]);

        return view('client.block_templates.includes.my-trenings', ['weekday' => strtolower(strftime("%A"))]);
    }

    public function getByDayTrenings(Request $request)
    {
        $result = [];
        if ($request->has('weekday')) {
            $result = [];
            $result['my-trenings'] = view('client.block_templates.includes.my-trenings', ['weekday' => $request->get('weekday')])->render();
            $result['added-trenings'] = view('client.block_templates.includes.added-trenings', ['weekday' => $request->get('weekday')])->render();

            return $result;
        }

        return $result;
    }
    
    public function allTrenings()
    {
        return view('client.block_templates.includes.all-trenings')->render();
    }
    
    public function getAddedTrenings(Request $request)
    {
        return view('client.block_templates.includes.added-trenings', ['weekday' => strtolower(strftime("%A"))])->render();
    }


}
<?php

namespace App\Services;

use App\Models\Language;
use App\Models\Module;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserService
{
    /**
     * create user
     * @param array $data
     * @return User
     */
    public function createUser(array $data): User
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'module_id' => $data['module_id'],
        ]);

        $profile = Module::where('name', 'clients')
            ->first()
            ->items()
            ->create();

        $lang_id = Language::where('iso', config('app.fallback_locale'))->first()->id;
        $seo['lang_id'] = $lang_id;
        $seo['title'] = $data['name'];
        $seo['alias'] = $data['name'];
        $seo['meta_keywords'] = $data['name'];
        $seo['meta_description'] = $data['name'];
        $profile->seo()->create($seo);

        $addition['lang_id'] = $lang_id;
        $addition['title'] = $data['name'];
        $profile->addition()->create($addition);

        $attrs = Module::where('name', 'clients')->first()->attrs;

        foreach ($attrs as $attr) {
            switch ($attr->key) {
                case 'photo':
                case 'Sername':
                case 'password':
                    $value = NULL;
                    break;
                case 'name':
                case 'login':
                    $value = $data['name'];
                    break;
                case 'email':
                    $value = $data['email'];
                    break;
                case 'treinings-personal':
                    $value = json_encode(array());
                    break;
                default:
                    $value = NULL;
                    break;
            }

            $profile->props()->create([
                'value' => $value,
                'module_attribute_id' => $attr->id,
            ]);
        }

        $user->module_item_id = $profile->id;
        $user->save();

        $user->setRole($data['role']);

        return $user;
    }

}
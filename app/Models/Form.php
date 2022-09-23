<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'form',
        'email',
    ];

    // PROPERTIES ATTRIBUTES

    /**
     * @return HasMany
     */
    public function translations(): HasMany
    {
        return $this
            ->hasMany(FormTranslation::class, 'form_id', 'id');
    }

    public function translate()
    {
        return $this
            ->hasOne(FormTranslation::class, 'form_id', 'id')
            ->current();
    }

    public function getFields()
    {
        $str = $this->form;
        $output_array = array();
        preg_match_all("#\[.*?\]#", $str, $output_array);

        $array = [];
        foreach ($output_array[0] as $item) {
            $result = str_replace(['[', ']'], '', $item);
            $result_array = explode(' ', $result);

            foreach ($result_array as $key => $element) {
                if ($result_array[0] != 'submit') {
                    if ($key == 1) {
                        $array[] = '['.$element.']';
                    }
                }
            }
        }

        return $array;
    }

    public function getForm()
    {
        $str = $this->form;
        $output_array = array();
        preg_match_all("#\[.*?\]#", $str, $output_array);

        $array = [];
        foreach ($output_array[0] as $item) {
            $required = '';
            $name = '';
            $class = '';
            $id = '';
            $for = '';
            $label = '';
            $placeholder = '';
            $labelText = '';
            $default = '';
            $result = str_replace(['[', ']'], '', $item);
            $result_array = explode(' ', $result);


            foreach ($result_array as $key => $element) {
                if ($key == 0) {
                    if (strstr($result_array[0], '*')) {
                        $required = ' required';
                        $result_array[0] = str_replace('*', '', $result_array[0]);
                    }
                } elseif ($key == 1) {
                    if ($result_array[0] == 'file') {
                        $name = ' name="' . $element . '" ';
                    } else {
                        $name = ' name="' . $element . '" ';
                    }
                } else {
                    if (strstr($element, 'class="')) {
                        $class = ' ' . $element;
                    }

                    if (strstr($element, 'id="')) {
                        $id = ' ' . $element;
                        $for = str_replace(['id="', '"'], '', $element);
                    }

                    if (strstr($element, 'placeholder="')) {
                        $placeholder = ' ' . $element;
                    }

                    if (strstr($element, 'default="')) {
                        $default = ' ' . str_replace('default', 'value', $element);
                    }

                    if (strstr($element, 'label="')) {
                        $labelText = str_replace(['label="', '"'], '', $element);
                        $label = '<label for="' . $for . '">' . $labelText . '</label>';
                    }
                }
            }

            switch ($result_array[0]) {
                case 'text':
                    $result = $label . '<input type="text" ' . $class . $id . $required . $name . $placeholder . $default . '>';
                    break;
                case 'email':
                    $result = $label . '<input type="email" ' . $class . $id . $required . $name . $placeholder . $default . '>';
                    break;
                case 'tel':
                    $result = $label . '<input type="tel" ' . $class . $id . $required . $name . $placeholder . $default . '>';
                    break;
                case 'number':
                    $result = $label . '<input type="number" ' . $class . $id . $required . $name . $placeholder . $default . '>';
                    break;
                case 'date':
                    $result = $label . '<input type="date" ' . $class . $id . $required . $name . $placeholder . $default . '>';
                    break;
                case 'file':
                    $result = $label . '<input multiple type="file" ' . $class . $id . $required . $name . '>';
                    break;
                case 'submit':
                    $labelText = 'value="'.$labelText.'"';
                    $result = '<input type="submit" ' . $class . $id  . $labelText . '>';
                    break;
                case 'textarea':
                    $result = $label . '<textarea type="date" ' . $class . $id . $required . $name . $placeholder . '>' . $default . '</textarea>';
                    break;
                case 'checkbox':
                    $result = '<input type="checkbox" ' . $class . $id . $required . $name . $placeholder . $default . '>'.$label;
                    break;
                case 'radio':
                    $result = '<input type="radio" ' . $class . $id . $required . $name . $placeholder . $default . '>'.$label;
                    break;
            }

            $array[$item] = $result;
        }

        foreach ($array as $key => $item) {
            $str = str_replace($key, $item, $str);
        }

        return '<form enctype="multipart/form-data" method="post" action="" class="laraform" name="'.$this->key.'" id="'.$this->key.'">'.$str.'</form>';
//        dd($array);
    }

//    public function items(): HasMany
//    {
//        return $this->hasMany(GalleryItem::class)->orderBy('order');
//    }
}

<?php

namespace Cp\QuestionAnswer\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations; 

class QuestionAnswer extends Model
{
    use HasFactory, HasTranslations;

    public $translatable = ['question', 'answer',];

    function localeQuestion($code) 
    {
        $a = json_decode(json_encode($this->getTranslations('question')), true);
        if($a)
        {
            if(array_key_exists($code, $a))
            {
                return $a[$code];
            }
            return null;
            
        }
    }

    function localeQuestionShow() 
    {
        $a = json_decode(json_encode($this->getTranslations('question')), true);
        $code = app()->getLocale();

        if ($a && $code !== null && array_key_exists($code, $a) && $a[$code] !== null) {
            return $a[$code];
        } else {
            foreach ($a as $k => $item) {
                if ($item !== null) {
                    return $item;
                }
            }
        }
    }

    

    function localeAnswer($code) 
    {
        $a = json_decode(json_encode($this->getTranslations('answer')), true);
        if($a)
        {
            if(array_key_exists($code, $a))
            {
                return $a[$code];
            }
            return null;
            
        }
    }

    function localeAnswerShow() 
    {
        $a = json_decode(json_encode($this->getTranslations('answer')), true);
        $code = app()->getLocale();

        if ($a && $code !== null && array_key_exists($code, $a) && $a[$code] !== null) {
            return $a[$code];
        } else {
            foreach ($a as $k => $item) {
                if ($item !== null) {
                    return $item;
                }
            }
        }
    }

}
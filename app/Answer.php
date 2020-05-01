<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = ['body'];

    public function question() {
        return $this->belongsTo('App\Question');
    }
    public function user() {
        return $this->belongsTo('App\User');
    }
    protected static function booted()
    {
       
        static::created(function ($answer) {
            $answer->question->increment('answers_count');
            $answer->question->save();
        });
        
    }
}

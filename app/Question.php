<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = ['title', 'body'];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function answers() {
        return $this->hasMany('App\Answer');
    }
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }
    public function getCreateDateAttribute() {
        return $this->created_at->diffForHumans();
    }
    public function getUrlAttribute() {
        return route("questions.show",$this->id);
    }
    public function getStatusAttribute() {
        if($this->answers_count > 0) {
            return "answered";
        }
        return "unanswered";
    }
}

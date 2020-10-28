<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $guarded = [];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }
}

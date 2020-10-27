<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyCompilation extends Model
{
    protected $guarded = [];

    public function survey()
    {
        return $this->$this->belongsTo(Survey::class);
    }

    public function responses()
    {
        return $this->hasMany(SurveyResponse::class);
    }
}

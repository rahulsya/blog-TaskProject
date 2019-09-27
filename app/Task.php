<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $casts=[
        'is_complete'=>'boolean',
    ];

    protected $fillable=[
        'title',
        'is_complete'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}

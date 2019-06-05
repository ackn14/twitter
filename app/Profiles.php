<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profiles extends Model
{
    protected $guarded = array('id');
    public static $rules =array(
        'name' => 'required',
        'twitterId' => 'required',
        'introduction' => 'required',
        'image_path' => 'required',
    );
    
    public function user(){
        return $this->belongsTo('App\User');
    }
    
    public function Profilehistory(){
        return $this->hasMany('App\Profilehistory');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Twitters extends Model
{
    protected $guarded = array('id');
    //
    public static $rules = array(
        'body' => 'required',
    );
    
    //Userモデルに関連付けを行う
    public function user()
    {
        return $this->belongsTo('App\User');
    }    
    
}
?>
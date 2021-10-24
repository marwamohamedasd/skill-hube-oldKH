<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Cat extends Model
{
    use HasFactory;


    protected $guard=['id','created_at','updated_at'];
    protected $fillable=['name','active'];
//  cat has many skill

  public function skills()
{

    return $this->hasMany(Skill::class);

}



public function name($lang="en")
{



    $lang=$lang?? App::getLocale();


        return json_decode($this->name)->$lang;



}


function scopeActive($query)
{


    return $query->where('active',1);
}


}

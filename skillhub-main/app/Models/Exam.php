<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;


class Exam extends Model
{
    use HasFactory;

// exam has one skill

protected $guard=['id','created_at','updated_at'];

protected $fillable=['name','skill_id','difficulty','img','desc','questions_no','duration_mins'];

public function skill()
{
return $this->belongsTo(Skill::class);
}

// exams has many questions

public function questions()
{
return $this->hasMany(Question::class);
}

public function  users()
{
 return $this->belongsToMany(User::class)
 ->withPivot('score','status','time_mins')->withTimestamps();
}





public function name($lang="en")
{

    $lang=$lang?? App::getLocale();

        return json_decode($this->name)->$lang;

}


public function desc($lang=null)
{



    $lang=$lang?? App::getLocale();


        return json_decode($this->desc)->$lang;



}


}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use QCod\ImageUp\HasImageUploads;


class Skill extends Model
{
    use HasFactory;

    protected $guard=['id','created_at','updated_at'];

    protected $fillable=['name','active','img','cat_id'];



public function cat()
{

    return $this->belongsTo(Cat::class);
}

// skill has many exams
public function exams()
{

    return $this->hasMany(Exam::class);
}




public function name($lang="en")
{



    $lang=$lang?? App::getLocale();


        return json_decode($this->name)->$lang;



}




public function getStudentsCount()
{

    $studentNum=0;


    foreach ($this->exams as $exam)
    {
               $studentNum+=$exam->users()->count();

    }

return $studentNum;


}




}

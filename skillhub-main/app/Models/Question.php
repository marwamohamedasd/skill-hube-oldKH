<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
// question belong to one exam

protected $guard=['id','created_at','updated_at'];
protected $fillable=['exam_id','title','option_1','option_2','option_3','option_4','right_ans'];

public function exam()
{

  return $this->belongsTo(Exam::class);
}

}

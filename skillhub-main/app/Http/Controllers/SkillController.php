<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{

    public function index()
    {

        return view('web.home.index');
    }

    public function showSkills($id)
    {

 $data['skill']=Skill::findOrFail($id);

 return view('web.skills.show')->with($data);



    }



    public function register()
    {


        // return view('web.skills.register');
    }

}

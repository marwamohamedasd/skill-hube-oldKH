<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

            Setting::create([

                      'email'=>'k@gmail.om',
                        'phone'=>'1223432424',
                        'facebook'=>'facebook.com',
                           'twitter'=>'twitter.com',
                           'instagram'=>'https://www.instgram.com',
                           'youtube'=>'www.linkin.com',
                           'linkedin'=>'www.linkin.com'

            ]);

    }
}

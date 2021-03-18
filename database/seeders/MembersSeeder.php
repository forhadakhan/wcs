<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Member;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class MembersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $i = 10;
        while($i--){
            Member::insert([
                'type_member' => 3,
                'img_member' => null,
                'name_member' => Str::random(10),
                'birthday_member' => null,
                'gender_member' => 'F',
                'phone_member' => random_int(12310001, 12398899),
                'nid_member' => random_int(1000000001, 9999999999),
                'access_member' => false,
                'email_member' => Str::random(10).'@mail.test',
                'password_member' => Hash::make('pass'),
                'created_at' => Carbon::now()->toDateTimeString()
            ]);
        }

    }
}

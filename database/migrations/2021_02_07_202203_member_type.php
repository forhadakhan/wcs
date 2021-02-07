<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class MemberType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('members_type_tbl', function (Blueprint $table) {
            $table->id('id_members_type');
            $table->string('name_members_type', 20);
        });

        $types = ['None','Regular','Basic','Platinum','Gold'];
        foreach($types as $type){
            $query = DB::table('members_type_tbl')
                         ->insert([
                             'name_members_type' => $type,
                         ]);
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('members_type_tbl');
    }
}

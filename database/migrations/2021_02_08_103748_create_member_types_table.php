<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateMemberTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('member_types_tbl', function (Blueprint $table) {
            $table->id('id_member_type');
            $table->string('name_member_type', 20);
        });

        $types = ['None','Regular','Basic','Platinum','Gold'];
        foreach($types as $type){
            $query = DB::table('member_types_tbl')
                         ->insert([
                             'name_member_type' => $type,
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
        Schema::dropIfExists('member_types_tbl');
    }
}

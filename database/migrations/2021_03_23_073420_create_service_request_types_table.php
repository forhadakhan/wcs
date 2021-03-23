<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateServiceRequestTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_request_types_tbl', function (Blueprint $table) {
            $table->id('id_srt');
            $table->string('category_srt', 40)->nullable($value = true)->default(null);
        });

        $categories = ['Others','Financial','Savings','Mentorship','Counseling'];

        foreach($categories as $category){
            $query = DB::table('service_request_types_tbl')
                         ->insert([
                             'category_srt' => $category
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
        Schema::dropIfExists('service_request_types_tbl');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateServiceRequestSubTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_request_sub_types_tbl', function (Blueprint $table) {
            $table->id('id_srst');
            $table->string('sub_category_srst', 40)->nullable($value = true)->default(null);
        });

        $subCategories = ['Others','Loan','Funding','Emergency Needs','Fixed - 12 Months','Fixed - 6 Months','Fixed - 3 Months','Non Fixed', 'Regular', 'Occasional', 'Personal', 'Family', 'Social', 'Professional'];

        foreach($subCategories as $subCategory){
            $query = DB::table('service_request_sub_types_tbl')
                         ->insert([
                             'sub_category_srst' => $subCategory
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
        Schema::dropIfExists('service_request_sub_types_tbl');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_requests_tbl', function (Blueprint $table) {
            $table->id('id_sr');
            $table->bigInteger('member_id_sr')->unsigned();
            $table->bigInteger('category_sr')->unsigned()->default(1);
            $table->bigInteger('sub_category_sr')->unsigned()->default(1);
            $table->string('title_sr');
            $table->mediumText('body_sr');
            $table->string('amount_sr')->nullable($value = true);
            $table->date('bofore_date_sr')->nullable($value = true);
            $table->enum('status_sr', ['ACCEPTED', 'DECLINED', 'PROCESSING', 'RUNNING', 'COMPLETED'])->default('PROCESSING');
            $table->timestamps();

            $table->index('member_id_sr');
            $table->index('category_sr');
            $table->index('sub_category_sr');

            $table->foreign('member_id_sr')->references('id_member')->on('members_tbl')->onDelete('cascade');
            $table->foreign('category_sr')->references('id_srt')->on('service_request_types_tbl')->onDelete('cascade');
            $table->foreign('sub_category_sr')->references('id_srst')->on('service_request_sub_types_tbl')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_requests_tbl');
    }
}

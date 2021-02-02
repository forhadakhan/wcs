<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applications_tbl', function (Blueprint $table) {
            $table->id('id_application');
            $table->string('fullName_application', 70);
            $table->string('phone_application', 15)->unique();
            $table->string('email_application', 50)->nullable($value = true);
            $table->text('whyInterested_application')->nullable($value = true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('	updated_at')->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applications_tbl');
    }
}

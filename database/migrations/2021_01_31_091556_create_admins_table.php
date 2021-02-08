<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins_tbl', function (Blueprint $table) {
            $table->id('id_admin');
            $table->string('role_admin', 12);
            $table->string('name_admin', 70);
            $table->string('phone_admin', 15);
            $table->string('email_admin', 70);
            $table->string('password_admin', 150);
            $table->boolean('access_admin')->default(true);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('	updated_at')->useCurrentOnUpdate();

            $table->unique('email_admin');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins_tbl');
    }
}

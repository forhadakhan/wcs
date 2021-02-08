<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('members_tbl', function (Blueprint $table) {
            $table->id('id_member');
            $table->tinyInteger('type_member')->default(1);
            $table->mediumText('img_member')->nullable($value = true);
            $table->string('name_member', 70);
            $table->date('birthday_member')->nullable($value = true);
            $table->char('gender_member', 7);
            $table->string('phone_member', 15)->unique();
            $table->string('nid_member', 20)->nullable($value = true);
            $table->boolean('access_member')->default(true);
            $table->string('email_member', 50)->nullable($value = true);
            $table->string('password_member', 150);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('members_tbl');
    }
}

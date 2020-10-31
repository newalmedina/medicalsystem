<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 150);
            $table->string('surnames', 150);
            $table->string('email')->unique();
            $table->string('password');

            $table->string('identification', 15);
            $table->date('born_date');
            $table->string('phone_number', 10);
            $table->char('gender', 1)->nullable($value = true)->default("M");
            $table->text('direction')->nullable($value = true);
            $table->boolean('is_admin')->nullable($value = true)->default(0);
            $table->boolean('is_doctor')->nullable($value = true)->default(0);
            $table->boolean('active');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::dropIfExists('users');
    }
}

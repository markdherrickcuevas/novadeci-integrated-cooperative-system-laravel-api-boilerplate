<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('email')->unique();
            $table->string('username')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('status', 255);
            $table->rememberToken();
            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by', 255)->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_by', 255)->nullable();
            $table->softDeletes('deleted_at');
            $table->string('deleted_by', 255)->nullable();
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
};

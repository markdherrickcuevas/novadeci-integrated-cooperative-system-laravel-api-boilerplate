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
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->string('permission_name', 255);
            $table->timestamp('created_at');
            $table->string('created_by', 255);
            $table->timestamp('updated_at');
            $table->string('updated_by', 255);
            $table->timestamp('deleted_at');
            $table->string('deleted_by', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};

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
        Schema::create('employees_children', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('employee_id');
            $table->foreign('employee_id')->references('id')->on('employees');

            $table->string('childs_name', 255);
            $table->timestamp('created_at');
            $table->string('created_by', 255);
            $table->timestamp('updated_at');
            $table->string('updated_by', 255);
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('employees_children');
    }
};

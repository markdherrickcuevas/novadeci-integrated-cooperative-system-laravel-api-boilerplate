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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 255)->unique();
            $table->string('description', 255);
            $table->dateTime('attended_from');
            $table->dateTime('attended_to');

            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by', 255)->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_by', 255)->nullable();
            $table->softDeletes('deleted_at');
            $table->string('deleted_by', 255)->nullable();
            
            $table->foreign('employee_id')
                    ->references('employee_id')
                    ->on('employees')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
};

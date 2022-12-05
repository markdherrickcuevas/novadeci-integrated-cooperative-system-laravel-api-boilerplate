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
        Schema::create('employment_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('employment_status');
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('rank_id');
            $table->date('effective_date');
            $table->unsignedBigInteger('immediate_supervisor');

            $table->timestamp('created_at')->useCurrent();
            $table->string('created_by', 255)->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->string('updated_by', 255)->nullable();
            $table->softDeletes('deleted_at');
            $table->string('deleted_by', 255)->nullable();

            $table->foreign('employee_id')
                ->references('id')
                ->on('employees')
                ->onDelete('cascade');

            $table->foreign('employment_status')
                ->references('id')
                ->on('employment_status')
                ->onDelete('cascade');

            $table->foreign('department_id')
                ->references('id')
                ->on('departments')
                ->onDelete('cascade');

            $table->foreign('position_id')
                ->references('id')
                ->on('positions')
                ->onDelete('cascade');

            $table->foreign('rank_id')
                ->references('id')
                ->on('ranks')
                ->onDelete('cascade');

            $table->foreign('immediate_supervisor')
                ->references('id')
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
        Schema::dropIfExists('employment_history');
    }
};

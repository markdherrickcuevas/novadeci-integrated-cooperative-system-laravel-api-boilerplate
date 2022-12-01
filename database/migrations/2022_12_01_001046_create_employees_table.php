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
        Schema::create('employee', function (Blueprint $table) {
            $table->id();
            $table->string('employee_id', 10)->unique();
            $table->string('firstname', 255);
            $table->string('middlename', 255);
            $table->string('lastname', 255);
            $table->string('suffix', 10);
            $table->string('nickname', 255);
            $table->date('dob');
            $table->string('gender', 255);
            $table->string('religion', 255);
            $table->string('email', 255);
            $table->string('mobile', 11);
            $table->enum('civil_status', ['single', 'married', 'separated', 'widowed']);
            $table->string('name_of_spouse', 255)->nullable();
            $table->integer('total_num_of_children')->nullable();
            $table->string('blood_type', 255);
            $table->dateTime('date_hired');
            $table->string('position', 255);
            $table->string('pagibig_no', 255);
            $table->string('sss_no', 255);
            $table->string('tin_no', 255);
            $table->string('philhealth_no', 255);
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
        Schema::dropIfExists('employee');
    }
};

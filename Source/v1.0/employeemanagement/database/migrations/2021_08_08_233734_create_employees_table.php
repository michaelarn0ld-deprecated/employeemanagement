<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table){
            $table->id();
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('address');
            $table->foreignId('department_id')->constrained('departments');
            $table->foreignId('city_id')->constrained('cities');
            $table->foreignId('state_id')->constrained('states');
            $table->foreignId('country_id')->constrained('countries');
            $table->char('zip_code');
            $table->date('birth_date')->nullable();
            $table->date('date_hired');
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
        Schema::dropIfExists('employees');
    }
}

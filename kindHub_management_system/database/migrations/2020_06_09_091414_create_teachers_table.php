<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->bigIncrements('teacherId');
            $table->date('addDate');
            $table->string('addUser');
            $table->string('firstName');
            $table->string('lastName');
            $table->char('gender',1);
            $table->year('joinedYear');
            $table->foreignId('classId');
            $table->date('updDate');
            $table->string('updUser');
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
        Schema::dropIfExists('teachers');
    }
}

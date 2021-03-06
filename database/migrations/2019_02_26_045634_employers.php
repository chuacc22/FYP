<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Employers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('status', 1)->index(); //use 1 or 2 (determine active or block)
            $table->string('password', 15)->index(); 
            $table->string('name', 50)->index();
            $table->string('email', 60)->index();
            $table->string('mobileNo',11)->index();
            $table->text('address');
            $table->string('companyName')->index();
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
        Schema::dropIfExists('employers');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePackagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('packages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('create_by');
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('amount',8,2);
            $table->integer('type')->default(false)->comment('0=lone,1=saving,2=double');
            $table->integer('period')->default(false)->comment('0=day,1=week,2=month');
            $table->integer('status')->default(false)->comment('0=suspend,1=active');
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
        Schema::dropIfExists('packages');
    }
}

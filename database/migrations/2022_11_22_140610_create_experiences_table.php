<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('location');
            $table->string('company');
            $table->string('from');
            $table->string('to');
            $table->foreignId('user_id')->unsigned()->nullable();
            $table->timestamps();
        });

        DB::table('experiences')->insert(

            [
                'title' => 'Software Engineer',
                'location' => 'Dar es Salaam',
                'company' => 'Multics Systems',
                'from' => '10/2020',
                'to' => 'Present',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('experiences');
    }
};

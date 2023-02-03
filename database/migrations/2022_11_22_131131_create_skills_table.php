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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->mediumText('skill');
            $table->foreignId('user_id')->unsigned()->nullable();
            $table->timestamps();
        });
        // Insert some stuff
        DB::table('skills')->insert(
            array(
                [
                    'skill' => 'Teamwork',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'skill' => 'Adaptability and Flexibility',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'skill' => 'Communications',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'skill' => 'Reasoning and Critical thinking',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'skill' => 'Programming',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
};

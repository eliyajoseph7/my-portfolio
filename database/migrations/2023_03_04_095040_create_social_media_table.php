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
        Schema::create('social_media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('link');
            $table->foreignId('user_id')->unsigned()->nullable();
            $table->timestamps();
        });

         // Insert some stuff
         DB::table('social_media')->insert(
            array(
                [
                    'name' => 'linkedin',
                    'link' => 'https://www.linkedin.com/in/eliya-joseph-26a1a21a2',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'facebook',
                    'link' => '#',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'instagram',
                    'link' => '#',
                    'user_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'name' => 'github',
                    'link' => 'https://github.com/eliyajoseph7',
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
        Schema::dropIfExists('social_media');
    }
};

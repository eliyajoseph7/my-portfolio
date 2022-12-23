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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role');
            $table->string('slug');
            $table->timestamps();
        });

        // Insert some stuff
        DB::table('roles')->insert(
            array(
                [
                    'role' => 'Admin',
                    'slug' => 'admin',
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'role' => 'User',
                    'slug' => 'user',
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
        Schema::dropIfExists('roles');
    }
};

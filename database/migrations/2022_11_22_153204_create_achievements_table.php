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
        Schema::create('achievements', function (Blueprint $table) {
            $table->id();
            $table->mediumText('achievement');
            $table->foreignId('experience_id')->unsigned()->nullable()->onDelete('cascade');
            $table->timestamps();
        });

        DB::table('achievements')->insert(
            array(
                [
                    'achievement' => 'Develop Agriculture Dashboard for the Tanzania Ministry of Agriculture (MoA) using Angular and Laravel frameworks.',
                    'experience_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'achievement' => 'Develop Agriculture crops-stock dynamic web system and offline mobile app for the Tanzania Ministry of Agriculture (MoA) using Angular and Laravel frameworks.',
                    'experience_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'achievement' => 'Develop Budget, Expenditure, CPA & CSR, Administration and Fleet modules (ERP) for Tanzania National Housing Corporation(NHC) using Django python framework.',
                    'experience_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'achievement' => 'Develop strong experience on working with Git Version Control System while working on the ERP system.',
                    'experience_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'achievement' => 'Gained the presentation skills since as a developer i was involved in presenting the products to the customers as well as training them on how to use the product.',
                    'experience_id' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'achievement' => 'Develop an offline mobile app using Flutter for the Tanzania Ministry of Agriculture (MoA).',
                    'experience_id' => 1,
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
        Schema::dropIfExists('achievements');
    }
};

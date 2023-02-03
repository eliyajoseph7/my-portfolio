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
        Schema::create('summaries', function (Blueprint $table) {
            $table->id();
            $table->longText('summary');
            $table->foreignId('user_id')->unsigned()->nullable();
            $table->timestamps();
        });

         // Insert some stuff
         DB::table('summaries')->insert(
            array(
                [
                    'summary' => 
                            'Knowledgeable Software developer offering 4 + years leading cross-functional
                            teams and completing projects on-time. Seamlessly manages workloads and
                            meets challenging deadlines and quality benchmarks. Strong understanding of
                            common web technologies, languages and frameworks..',
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
        Schema::dropIfExists('summaries');
    }
};

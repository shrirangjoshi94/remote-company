<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'links',
            function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('link_url', 1000);
                $table->boolean('open_in_new_page')->default(false);
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): voids
    {
        Schema::dropIfExists('links');
    }
}

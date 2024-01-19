<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToTeamsTable extends Migration
{
    /**
     * Run the migrations.
     */public function up(): void
{
    Schema::table('teams', function (Blueprint $table) {
        $table->double('latitude');
        $table->double('longitude');
    });
}

public function down(): void
{
    Schema::table('teams', function (Blueprint $table) {
        $table->dropColumn('latitude');
        $table->dropColumn('longitude');
    });
}

}

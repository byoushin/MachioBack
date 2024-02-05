<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveColumnsFromTeamsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //Schema::table('teams', function (Blueprint $table) {
            //$table->dropColumn('latitude');
            //$table->dropColumn('keido');
        //});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Schema::table('teams', function (Blueprint $table) {
          //  $table->double('ido', 8, 6); // 適切な型と桁数を指定
            //$table->double('keido', 9, 6); // 適切な型と桁数を指定
        //});
    }
}

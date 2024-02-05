<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('mission_participations', function (Blueprint $table) {
            // idカラムを追加
            $table->id();

            // 既存の外部キー制約を削除
            $table->dropForeign(['mission_id']);
            $table->dropForeign(['team_id']);

            // mission_idをmissionsテーブルのidカラムに外部キーとして再設定
            $table->foreign('mission_id')->references('mission_id')->on('missions');

            // team_idをteamsテーブルのidカラムに外部キーとして再設定
            $table->foreign('team_id')->references('team_id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     */
    //public function down(): void
    //{
      //  Schema::table('mission_participations', function (Blueprint $table) {
        //    // 追加したidカラムを削除
          //  $table->dropColumn('id');

            // 既存の外部キー制約を削除
            //$table->dropForeign(['mission_id']);
            //$table->dropForeign(['team_id']);

            // mission_idをmissionsテーブルのmission_idカラムに外部キーとして再設定
            //$table->foreign('mission_id')->references('mission_id')->on('missions');

            // team_idをteamsテーブルのteam_idカラムに外部キーとして再設定
            //$table->foreign('team_id')->references('team_id')->on('teams');
        //});
    //}
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Add performance indexes. Uses IF NOT EXISTS to be safe if partially applied.
     */
    public function up()
    {
        $this->addIndexIfMissing('labharthi_form', 'status',        'idx_labharthi_status');
        $this->addIndexIfMissing('labharthi_form', 'name',          'idx_labharthi_name');
        $this->addIndexIfMissing('labharthi_form', 'mobile_number', 'idx_labharthi_mobile');
        $this->addIndexIfMissing('labharthi_form', 'area_id',       'idx_labharthi_area');

        // fix any invalid '0000-00-00' dates — temporarily disable strict mode for this query
        DB::statement("SET SESSION sql_mode = ''");
        DB::statement("UPDATE donations SET date = NULL WHERE CAST(date AS CHAR) = '0000-00-00'");
        DB::statement("SET SESSION sql_mode = 'STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION'");

        $this->addIndexIfMissing('donations', 'date',      'idx_donations_date');
        $this->addIndexIfMissing('donations', 'full_name', 'idx_donations_full_name');

        $this->addIndexIfMissing('attendances', 'attendance_date', 'idx_attendance_date');
        $this->addIndexIfMissing('attendances', 'labharthi_id',    'idx_attendance_labharthi');

        $this->addIndexIfMissing('contents', 'upload_date', 'idx_contents_upload_date');

        $this->addIndexIfMissing('employees', 'status', 'idx_employees_status');
    }

    public function down()
    {
        $this->dropIndexIfExists('labharthi_form', 'idx_labharthi_status');
        $this->dropIndexIfExists('labharthi_form', 'idx_labharthi_name');
        $this->dropIndexIfExists('labharthi_form', 'idx_labharthi_mobile');
        $this->dropIndexIfExists('labharthi_form', 'idx_labharthi_area');

        $this->dropIndexIfExists('donations', 'idx_donations_date');
        $this->dropIndexIfExists('donations', 'idx_donations_full_name');

        $this->dropIndexIfExists('attendances', 'idx_attendance_date');
        $this->dropIndexIfExists('attendances', 'idx_attendance_labharthi');

        $this->dropIndexIfExists('contents', 'idx_contents_upload_date');

        $this->dropIndexIfExists('employees', 'idx_employees_status');
    }

    private function addIndexIfMissing(string $table, string $column, string $indexName): void
    {
        $exists = DB::select("
            SELECT COUNT(*) as cnt
            FROM information_schema.statistics
            WHERE table_schema = DATABASE()
              AND table_name = ?
              AND index_name = ?
        ", [$table, $indexName]);

        if ($exists[0]->cnt === 0) {
            Schema::table($table, function (Blueprint $t) use ($column, $indexName) {
                $t->index($column, $indexName);
            });
        }
    }

    private function dropIndexIfExists(string $table, string $indexName): void
    {
        $exists = DB::select("
            SELECT COUNT(*) as cnt
            FROM information_schema.statistics
            WHERE table_schema = DATABASE()
              AND table_name = ?
              AND index_name = ?
        ", [$table, $indexName]);

        if ($exists[0]->cnt > 0) {
            Schema::table($table, function (Blueprint $t) use ($indexName) {
                $t->dropIndex($indexName);
            });
        }
    }
};

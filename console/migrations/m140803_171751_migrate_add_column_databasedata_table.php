<?php

use yii\db\Schema;
use yii\db\Migration;

class m140803_171751_migrate_add_column_databasedata_table extends Migration {

    public function up() {
        $this->addColumn('databasedata','strip_satellite',  Schema::TYPE_INTEGER);
        $this->addColumn('databasedata','strip_orbit_phase',  Schema::TYPE_INTEGER);  
    }

    public function down() {
        echo "m140803_171751_migrate_add_column_databasedata_table cannot be reverted.\n";

        return false;
    }

}

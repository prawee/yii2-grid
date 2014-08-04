<?php

use yii\db\Schema;
use yii\db\Migration;

class m140804_023639_change_column_trial_local_table extends Migration {

    public function up() {
        $this->alterColumn('trial_local','medium_post_x',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('trial_local','medium_post_y',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('trial_local','medium_post_z',  Schema::TYPE_STRING.'(100) NULL');
        
        $this->alterColumn('trial_local','roll',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('trial_local','pitch',  Schema::TYPE_STRING.'(100) NULL');
    }

    public function down() {
        echo "m140804_023639_change_column_trial_local_table cannot be reverted.\n";

        return false;
    }

}

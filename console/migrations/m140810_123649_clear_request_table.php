<?php

use yii\db\Schema;
use yii\db\Migration;

class m140810_123649_clear_request_table extends Migration
{
    public function up()
    {
        $this->dropTable('miseo_group_local');
        $this->dropTable('misson_local');
        $this->dropTable('plan_local');
        $this->dropTable('strip_access_local');
        $this->dropTable('splitted_strip_local');
        $this->dropTable('strips');
        $this->dropTable('trial_local');
        $this->dropTable('target_strip_local');
        
        $this->dropTable('criteria');
        $this->dropTable('dailyplan');
        $this->dropTable('databasedata');
        $this->dropTable('definition');
        $this->dropTable('groupzone');
        $this->dropTable('progzone');
    }

    public function down()
    {
        echo "m140810_123649_clear_request_table cannot be reverted.\n";
        $this->dropTable('criteria');
        return false;
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m140731_111450_migrate_xml_dailyplan_table extends Migration
{
    public function up()
    {

    }

    public function down()
    {
        echo "m140731_111450_migrate_xml_dailyplan_table cannot be reverted.\n";
        $this->dropColumn('xml','send_email');
        $this->dropColumn('dailyplan','scene_id');
        return false;
    }
}

<?php

use yii\db\Schema;
use yii\db\Migration;

class m140812_190959_migrate_mission_with_delete_xml extends Migration {

    public function up() {
        $this->addColumn('mission_local','xml_id',  Schema::TYPE_INTEGER);
        $this->addForeignKey('fk_missionlocal_xml','mission_local','xml_id','xml','id','CASCADE','CASCADE');
    }

    public function down() {
        echo "m140812_190959_migrate_mission_with_delete_xml cannot be reverted.\n";

        return false;
    }

}

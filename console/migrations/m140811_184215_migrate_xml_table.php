<?php

use yii\db\Schema;
use yii\db\Migration;

class m140811_184215_migrate_xml_table extends Migration {

    public function up() {
        //$this->renameColumn('xml','user_id','client_id');
        $this->dropColumn('xml','user_id');
        $this->addColumn('xml','client_id',  Schema::TYPE_INTEGER);
        $this->addColumn('xml','distributor_id',  Schema::TYPE_INTEGER);
        $this->addForeignKey('fk_xml_distributor','xml','distributor_id','user','id','SET NULL','CASCADE');
    }

    public function down() {
        echo "m140811_184215_migrate_xml_table cannot be reverted.\n";

        return false;
    }

}

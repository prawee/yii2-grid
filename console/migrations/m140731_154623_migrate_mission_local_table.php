<?php

use yii\db\Schema;
use yii\db\Migration;

class m140731_154623_migrate_mission_local_table extends Migration
{
    public function up()
    {
        $this->addColumn('mission_local','version',  Schema::TYPE_STRING.'(45) NULL');
        $this->addColumn('mission_local','image',  Schema::TYPE_STRING.'(45) NULL');
        $this->addColumn('mission_local','type',  Schema::TYPE_STRING.'(45) NULL');
        $this->addColumn('mission_local','status',  Schema::TYPE_INTEGER);
    }

    public function down()
    {
        echo "m140731_154623_migrate_mission_local_table cannot be reverted.\n";

        return false;
    }
}

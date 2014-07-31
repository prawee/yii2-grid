<?php

use yii\db\Schema;
use yii\db\Migration;

class m140731_132525_migrate_miseo_group_local extends Migration
{
    public function up()
    {
        $this->addColumn('miseo_group_local','status',  Schema::TYPE_INTEGER);
        $this->addColumn('miseo_group_local','image',  Schema::TYPE_STRING.'(20) NULL');
    }

    public function down()
    {
        echo "m140731_132525_migrate_miseo_group_local cannot be reverted.\n";

        return false;
    }
}

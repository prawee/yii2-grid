<?php

use yii\db\Schema;
use yii\db\Migration;

class m140731_191427_migrate_splitted_strip_local_table extends Migration
{
    public function up()
    {
        $this->addColumn('splitted_strip_local','status',  Schema::TYPE_INTEGER);
        $this->addColumn('splitted_strip_local','type',  Schema::TYPE_STRING.'(45) NULL');
        $this->addColumn('splitted_strip_local','image',  Schema::TYPE_STRING.'(45) NULL');
        $this->addColumn('splitted_strip_local','name',  Schema::TYPE_STRING.'(255) NULL');
    }

    public function down()
    {
        echo "m140731_191427_migrate_splitted_strip_local_table cannot be reverted.\n";

        return false;
    }
}

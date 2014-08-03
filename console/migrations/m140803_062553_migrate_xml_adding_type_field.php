<?php

use yii\db\Schema;
use yii\db\Migration;

class m140803_062553_migrate_xml_adding_type_field extends Migration
{
    public function up()
    {
        $this->createTable('xml_type',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(128) NOT NULL',
        ]);
        $this->insert('xml_type',['name' =>'request']);
        $this->insert('xml_type',['name' =>'dailyplan']);
        $this->insert('xml_type',['name' =>'cuf']);
        $this->addColumn('xml','xml_type_id',  Schema::TYPE_INTEGER);
    }

    public function down()
    {
        echo "m140803_062553_migrate_xml_adding_type_field cannot be reverted.\n";

        return false;
    }
}

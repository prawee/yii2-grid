<?php

use yii\db\Schema;
use yii\db\Migration;

class m140728_121446_dailyplan extends Migration
{
    public function up()
    {
        $this->createTable('dailyplan',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'path'=> Schema::TYPE_STRING.'(255) NULL',
            'user_id'=>  Schema::TYPE_INTEGER,
            'scene_id'=>  Schema::TYPE_INTEGER,
            'status'=>  Schema::TYPE_BOOLEAN,
        ]);
        $this->addForeignKey('fk_dailyplan_user','dailyplan','user_id','user','id','RESTRICT','CASCADE');

    }

    public function down()
    {
        echo "m140728_121446_dailyplan cannot be reverted.\n";
        $this->dropTable('dailyplan');
        return false;
    }
}

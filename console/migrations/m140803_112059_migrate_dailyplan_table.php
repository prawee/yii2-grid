<?php

use yii\db\Schema;
use yii\db\Migration;

class m140803_112059_migrate_dailyplan_table extends Migration {

    public function up() {
        //2
        $this->createTable('plan_status',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(45) NULL',
        ]);
        $this->insert('plan_status',['name' => 'RANKED']);
        $this->insert('plan_status',['name' => 'CREATED']);
        $this->insert('plan_status',['name' => 'PLANNED']);
        $this->insert('plan_status',['name' => 'VALIDATED']);
        $this->insert('plan_status',['name' => 'OUTOFDATE']);
        $this->insert('plan_status',['name' => 'DELETED']);
        $this->insert('plan_status',['name' => 'COMPLETED']);
        
        $this->createTable('plan_local',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'databasedata_id'=>  Schema::TYPE_INTEGER,
            'start_date'=>  Schema::TYPE_DATETIME,
            'end_date'=>  Schema::TYPE_DATETIME,
            'plan_status_id'=>  Schema::TYPE_INTEGER,
            'attr_version'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_image'=>  Schema::TYPE_STRING.'(128) NULL',
            'attr_key'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_status'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_type'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_lock'=>  Schema::TYPE_STRING.'(1) NULL',
        ]);
        $this->addForeignKey('fk_plan_plan_status','plan_local','plan_status_id','plan_status','id','RESTRICT','CASCADE');
        
    }

    public function down() {
        echo "m140803_112059_migrate_dailyplan_table cannot be reverted.\n";
        $this->dropTable('dailyplan');
        return false;
    }

}

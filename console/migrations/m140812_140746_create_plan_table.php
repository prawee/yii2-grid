<?php

use yii\db\Schema;
use yii\db\Migration;

class m140812_140746_create_plan_table extends Migration {

    public function up() {
        //1.plan_local
        $this->createTable('plan_local',[
            'id'=>  Schema::TYPE_PK,
            'attr_version'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_image'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_status'=> Schema::TYPE_STRING.'(45) NULL',
            'attr_type'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_lock'=>  Schema::TYPE_STRING.'(45) NULL',
            //databasedata
            'dbd_miseo_reference'=>  Schema::TYPE_STRING.'(255) NULL',
            'dbd_miseo_group'=>  Schema::TYPE_TEXT,
            'dbd_miseo_template'=>  Schema::TYPE_STRING.'(45) NULL',
            
            //definition
            'miseo_name'=>  Schema::TYPE_STRING.'(255) NULL',
            'start_date'=>  Schema::TYPE_DATETIME,
            'end_date'=>  Schema::TYPE_DATETIME,
            'plan_status_id'=>  Schema::TYPE_INTEGER,
            'plan_date'=>  Schema::TYPE_DATETIME,
            'info'=>  Schema::TYPE_STRING.'(255) NULL',
            'info1'=>  Schema::TYPE_STRING.'(255) NULL',
            'info2'=>  Schema::TYPE_STRING.'(255) NULL',
        ]);
        $this->addForeignKey('fk_planlocal_planstatus', 'plan_local', 'plan_status_id', 'plan_status', 'id', 'SET NULL', 'CASCADE');
        
        
        //2 mieso_group_local
        $this->createTable('miseo_group_local',[
            'id'=>  Schema::TYPE_PK,
            'attr_version'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_status'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_type'=>Schema::TYPE_STRING.'(45) NULL',
            'attr_image'=>Schema::TYPE_STRING.'(45) NULL',
            'attr_name'=>Schema::TYPE_STRING.'(255) NULL',
            
            //databasedata
            'dbd_miseo_reference'=>Schema::TYPE_STRING.'(255) NULL',
            'dbd_miseo_group'=>  Schema::TYPE_TEXT,
            'dbd_miseo_template'=>  Schema::TYPE_STRING.'(45) NULL',
            
            //groupzone
            'gz_attr_name'=>Schema::TYPE_STRING.'(45) NULL',
            'gz_attr_image'=>Schema::TYPE_STRING.'(45) NULL',
            'gz_attr_type'=>Schema::TYPE_STRING.'(45) NULL',
            'gz_attr_c1'=>Schema::TYPE_STRING.'(45) NULL',
            'gz_attr_c2'=>Schema::TYPE_STRING.'(45) NULL',
            'gz_attr_c3'=>Schema::TYPE_STRING.'(45) NULL',
            'gz_attr_c4'=>Schema::TYPE_STRING.'(45) NULL',
            'gz_miseo_name'=>Schema::TYPE_STRING.'(255) NULL',
            'gz_info1'=>Schema::TYPE_TEXT,
            'gz_info2'=>Schema::TYPE_TEXT,
            'gz_info3'=>Schema::TYPE_TEXT,
            'gz_info4'=>  Schema::TYPE_TEXT,
        ]);
        
        //3 add column mission_local
        $this->addColumn('mission_local','miseo_group_local_id',  Schema::TYPE_INTEGER);
        $this->addForeignKey('fk_missionlocal_miseogrouplocal','mission_local','miseo_group_local_id','miseo_group_local','id','CASCADE','CASCADE');
    }

    public function down() {
        echo "m140812_140746_create_plan_table cannot be reverted.\n";

        return false;
    }

}

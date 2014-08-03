<?php

use yii\db\Schema;
use yii\db\Migration;

class m140803_184438_trial_local_table extends Migration {

    public function up() {
        //2
        $this->createTable('trial_status',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(128) NOT NULL',
        ]);
        $this->insert('trial_status',['name'=>'CREATED']);
        $this->insert('trial_status',['name'=>'PLANNED']);
        $this->insert('trial_status',['name'=>'PROGRAMMED']);
        $this->insert('trial_status',['name'=>'COMPLETED']);
        $this->insert('trial_status',['name'=>'OUTOFDATE']);
        
        //1
        $this->createTable('trial_local',[
            'id'=>  Schema::TYPE_PK,
            
            //attributes
            'attr_name'=>  Schema::TYPE_STRING.'(255) NOT NULL', 
            'attr_lock'=> Schema::TYPE_STRING.'(1) NULL',
            'attr_image'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_type'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_status'=> Schema::TYPE_STRING.'(45) NULL',
            
            //databasedata
            'miseo_reference'=>  Schema::TYPE_STRING.'(255) NULL', 
            'miseo_group'=>  Schema::TYPE_STRING.'(255) NULL',
            'miseo_template'=>Schema::TYPE_STRING.'(255) NULL',
            'medium_post_x'=>  Schema::TYPE_DECIMAL.'(20,15)',
            'medium_post_y'=>  Schema::TYPE_DECIMAL.'(20,15)',
            'medium_post_z'=>  Schema::TYPE_DECIMAL.'(20,15)',
            'plan_id'=>Schema::TYPE_STRING.'(255) NULL',
            
            //definition
            'trial_status_id'=>  Schema::TYPE_INTEGER, 
            'satellite'=>  Schema::TYPE_STRING.'(1) NULL',
            'start_acqu_date'=>  Schema::TYPE_DATETIME,
            'stop_acqu_date'=>  Schema::TYPE_DATETIME,
            'roll'=>  Schema::TYPE_DECIMAL.'(20,15)',
            'pitch'=>  Schema::TYPE_DECIMAL.'(20,15)',
            'orbit_cycle'=>  Schema::TYPE_INTEGER,
            'luminosity'=>  Schema::TYPE_STRING.'(1) NULL',  //N=Nominal,W=Weak,Z=Insufficient
            'cloud_coverage'=>  Schema::TYPE_INTEGER,
        ]);
    }

    public function down() {
        echo "m140803_184438_trial_local_table cannot be reverted.\n";
        $this->dropTable('trial_local');
        return false;
    }

}

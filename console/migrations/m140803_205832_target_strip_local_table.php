<?php

use yii\db\Schema;
use yii\db\Migration;

class m140803_205832_target_strip_local_table extends Migration {

    public function up() {
        //2
        $this->createTable('target_status',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(128) NOT NULL',
        ]);
        $this->insert('target_status',['name'=>'CREATED']);
        $this->insert('target_status',['name'=>'PLANNED']);
        $this->insert('target_status',['name'=>'PROGRAMMED']);
        $this->insert('target_status',['name'=>'COMPLETED']);
        $this->insert('target_status',['name'=>'OUTOFDATE']);
        //1
        $this->createTable('target_strip_local',[
            'id'=>  Schema::TYPE_PK,
            //attribute
            'attr_name'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'attr_status'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_type'=>  Schema::TYPE_STRING.'(45) NULL',
            'attr_image'=> Schema::TYPE_STRING.'(45) NULL',
            'attr_c1'=> Schema::TYPE_INTEGER,
            'attr_c2'=> Schema::TYPE_INTEGER,
            'attr_c3'=> Schema::TYPE_INTEGER,
            'attr_c4'=> Schema::TYPE_INTEGER,
            //databasedata
            'miseo_reference'=>  Schema::TYPE_STRING.'(255) NULL', 
            'miseo_group'=>  Schema::TYPE_STRING.'(255) NULL',
            'miseo_template'=>Schema::TYPE_STRING.'(255) NULL',
            'satellite'=>  Schema::TYPE_STRING.'(1) NULL',
            'phase'=>  Schema::TYPE_STRING.'(1) NULL',
            'rev_no'=> Schema::TYPE_INTEGER,
            'plan_id'=>Schema::TYPE_STRING.'(255) NULL',
            //other
            'target_status_id'=> Schema::TYPE_INTEGER,
            'lat_center'=>  Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'lon_center'=>  Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'altitude_center'=>  Schema::TYPE_FLOAT,
            'strip_length'=> Schema::TYPE_FLOAT,
            'strip_width'=> Schema::TYPE_FLOAT,
            
            'lat_corner_nw'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'lon_corner_nw'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'altitude_nw'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            
            'lat_corner_ne'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'lon_corner_ne'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'altitude_ne'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            
            'lat_corner_se'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'lon_corner_se'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'altitude_se'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            
            'lat_corner_sw'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'lon_corner_sw'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            'altitude_sw'=> Schema::TYPE_DECIMAL.'(20,15)  NULL',
            
            'gain1'=> Schema::TYPE_STRING.'(1) NULL',
            'gain2'=> Schema::TYPE_STRING.'(1) NULL',
            'gain3'=> Schema::TYPE_STRING.'(1) NULL',
            'gain4'=> Schema::TYPE_STRING.'(1) NULL',
            
            'filenb'=> Schema::TYPE_INTEGER,
            
        ]);
    }

    public function down() {
        echo "m140803_205832_target_strip_local_table cannot be reverted.\n";
        $this->dropTable('target_strip_local');
        return false;
    }

}

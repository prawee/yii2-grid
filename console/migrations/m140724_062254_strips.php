<?php

use yii\db\Schema;
use yii\db\Migration;

class m140724_062254_strips extends Migration {

    public function up() {
        //2.strip_status
        $this->createTable('strip_status',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(128) NOT NULL',
        ]);
        $this->insert('strip_status',['name'=>'CREATED']);
        $this->insert('strip_status',['name'=>'FEASIBLE']);
        $this->insert('strip_status',['name'=>'NOT_FEASIBLE']);
        $this->insert('strip_status',['name'=>'RANKED']);
        $this->insert('strip_status',['name'=>'PLANNED']);
        $this->insert('strip_status',['name'=>'PROGRAMMED']);
        $this->insert('strip_status',['name'=>'FINISHED']);
        $this->insert('strip_status',['name'=>'INHIBITED']);
        
        //3.strips
        $this->createTable('strips',[
            'id'=>  Schema::TYPE_PK,
            'miseo_name'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'rank'=>  Schema::TYPE_INTEGER,
            'lat_center'=>  Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'lon_center'=> Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'strip_length'=>  Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'strip_width'=>Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'lat_corner_nw'=>Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'lon_corner_nw'=>Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'lat_corner_ne'=>Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'lon_corner_ne'=>Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'lat_corner_se'=>Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'lon_corner_se'=>Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'lat_corner_sw'=>Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'lon_corner_sw'=>Schema::TYPE_DECIMAL.'(20,15) NOT NULL',
            'strip_status_id'=>Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_strips_status','strips','strip_status_id','strip_status','id','RESTRICT', 'CASCADE');
        
        //1.splitted_strip_local
        $this->createTable('splitted_strip_local',[
            'id'=>  Schema::TYPE_PK,
            'databasedata_id'=>  Schema::TYPE_INTEGER,
            'strips_id'=>  Schema::TYPE_INTEGER,
            'scene_id'=>Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_splitted_strip_local_databasedata','splitted_strip_local','databasedata_id','databasedata','id','RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_splitted_strip_local_strips','splitted_strip_local','strips_id','strips','id','RESTRICT', 'CASCADE');
        
        //4.strip_access_local
        $this->createTable('strip_access_local',[
            'id'=>  Schema::TYPE_PK,
            'miseo_reference'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'miseo_group'=>Schema::TYPE_STRING.'(255) NOT NULL',
            'miseo_template'=>Schema::TYPE_STRING.'(255) NOT NULL',
            'orbit_cycle'=>  Schema::TYPE_INTEGER,
            'orbit_cycle_couple'=>  Schema::TYPE_TEXT,
            'roll_max_access'=>Schema::TYPE_DECIMAL.'(20,15)',
            'earliest_date'=>  Schema::TYPE_DATETIME,
            'splitted_strip_local_id'=>Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_stripaccesslocal_splittedstriplocal','strip_access_local','splitted_strip_local_id','splitted_strip_local','id','RESTRICT', 'CASCADE');
    }

    public function down() {
        echo "m140724_062254_strips cannot be reverted.\n";
        $this->dropTable('strip_access_local');
        $this->dropTable('splitted_strip_local');
        $this->dropTable('strip_access_local');
        $this->dropTable('databasedata');
        $this->dropTable('strips');
        $this->dropTable('strip_status');
        return false;
    }

}

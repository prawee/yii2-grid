<?php

use yii\db\Schema;
use yii\db\Migration;

class m140723_200349_miseo_group_local extends Migration {

    public function up() {
        //2.databasedata
        $this->createTable('databasedata',[
            'id'=>  Schema::TYPE_PK,
            'name'=> Schema::TYPE_STRING.'(255) NULL',
            'miseo_reference'=>  Schema::TYPE_STRING.'(255) NULL',
            'miseo_group'=>Schema::TYPE_STRING.'(255) NULL',
            'miseo_template'=>  Schema::TYPE_STRING.'(255) NULL',
            'nb_summits_cov'=>  Schema::TYPE_INTEGER,
            'stereo_type'=>  Schema::TYPE_STRING.'(1) DEFAULT "Z" ',
            'organism'=>  Schema::TYPE_INTEGER,
            'delta_lat_north'=>  Schema::TYPE_DECIMAL.'(15,15) NULL',
            'delta_lat_south'=> Schema::TYPE_DECIMAL.'(15,15) NULL',
        ]);
        
        //3.groupzone
        $this->createTable('groupzone',[
            'id'=>  Schema::TYPE_PK,
            'miseo_name'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'info_1'=>  Schema::TYPE_TEXT,
            'info_2'=> Schema::TYPE_TEXT,
            'info_3'=>  Schema::TYPE_TEXT,
            'info_4'=> Schema::TYPE_TEXT,
        ]);
        
        //1.miseo_group_local
        $this->createTable('miseo_group_local',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'version'=>  Schema::TYPE_STRING.'(45) NULL',
            'type'=>  Schema::TYPE_STRING.'(45) NULL',
            'databasedata_id'=>  Schema::TYPE_INTEGER,
            'groupzone_id'=>  Schema::TYPE_INTEGER,
            'scene_id'=>  Schema::TYPE_INTEGER,
        ]);
        $this->createIndex('unique_scene_id', 'miseo_group_local', 'scene_id', true);
        $this->addForeignKey('fk_mgl_databasedata', 'miseo_group_local', 'databasedata_id', 'databasedata', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_mgl_groupzone', 'miseo_group_local', 'groupzone_id', 'groupzone', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down() {
        echo "m140723_200349_miseo_group_local cannot be reverted.\n";
        $this->dropTable('miseo_group_local');
        $this->dropTable('databasedata');
        $this->dropTable('groupzone');
        return false;
    }

}

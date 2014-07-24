<?php

use yii\db\Schema;
use yii\db\Migration;

class m140723_234649_mission_local extends Migration {

    public function up() {
        //2.request_status
        $this->createTable('request_status',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(45) NULL',
        ]);
        $this->insert('request_status',['name' => 'WAIT FOR PROGRAMMING']);
        $this->insert('request_status',['name' => 'REPROGRAM 1']);
        $this->insert('request_status',['name' => 'REPROGRAM 2']);
        $this->insert('request_status',['name' => 'WAIT FOR PRODUCTION']);
        $this->insert('request_status',['name' => 'PENDING']);
        $this->insert('request_status',['name' => 'PRODUCTION']);
        $this->insert('request_status',['name' => 'COMPLETED']);
        $this->insert('request_status',['name' => 'CANCELLED']);
        $this->insert('request_status',['name' => 'OUT OF DATE']);
        
        //3.progzone
        $this->createTable('progzone',[
            'id'=>  Schema::TYPE_PK,
            'miseo_name'=>Schema::TYPE_STRING.'(255) NOT NULL',
            'satellite'=>  Schema::TYPE_INTEGER,
            'phase'=>  Schema::TYPE_INTEGER,
            'average_altitude'=>  Schema::TYPE_INTEGER,
            'miseo_template'=>Schema::TYPE_STRING.'(255) NOT NULL',
            'center_latitude'=>Schema::TYPE_FLOAT,
            'center_longitude'=>Schema::TYPE_FLOAT,
            'item_length'=>Schema::TYPE_INTEGER,
            'zonetype'=>Schema::TYPE_STRING.'(180) NOT NULL',
            'request_status_id'=>  Schema::TYPE_INTEGER,
            'downlink_station_id'=>  Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_progzone_request_status', 'progzone', 'request_status_id', 'request_status', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_progzone_downlink_station', 'progzone', 'downlink_station_id', 'downlink_station', 'id', 'RESTRICT', 'CASCADE');
        
        //4.priority
        $this->createTable('priority',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'value'=> Schema::TYPE_STRING.'(1) NULL',
        ]);
        $this->insert('priority',['name'=>'P1','value'=>'A']);
        $this->insert('priority',['name'=>'P2','value'=>'B']);
        $this->insert('priority',['name'=>'P3','value'=>'C']);
        $this->insert('priority',['name'=>'P4','value'=>'D']);
        $this->insert('priority',['name'=>'P5','value'=>'E']);
        $this->insert('priority',['name'=>'P6','value'=>'F']);
        
        //5.definition
        $this->createTable('definition',[
            'id'=>  Schema::TYPE_PK,
            'user_id'=>Schema::TYPE_STRING.'(255) NOT NULL',
            'user_coordinates'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'miseo_comment'=>  Schema::TYPE_TEXT,
            'deposit_date'=>  Schema::TYPE_DATETIME,
            'start_date'=>  Schema::TYPE_DATETIME,
            'end_date'=>Schema::TYPE_DATETIME,
            'completion_date'=>  Schema::TYPE_DATETIME,
            'periodicity_flag'=>  Schema::TYPE_STRING.'(1) NOT NULL',
            'priority_id'=>  Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_definition_priority', 'definition', 'priority_id', 'priority', 'id', 'RESTRICT', 'CASCADE');
        
        //6.criteria
        $this->createTable('criteria',[
            'id'=>  Schema::TYPE_PK,
            'updatable_gains'=>  Schema::TYPE_STRING.'(1) NOT NULL',
            'sensor_type'=>Schema::TYPE_STRING.'(1) NOT NULL',
            'nadir_viewing'=>Schema::TYPE_STRING.'(1) NOT NULL',
            'compression_ratio'=>Schema::TYPE_STRING.'(1) NOT NULL',
            'luminosity'=>  Schema::TYPE_STRING.'(1) NOT NULL',
        ]);
        
        //1.mission_local
        $this->createTable('mission_local',[
            'id'=>  Schema::TYPE_PK,
            'name'=> Schema::TYPE_STRING.'(45) NULL',
            'databasedata_id'=>  Schema::TYPE_INTEGER,
            'progzone_id'=> Schema::TYPE_INTEGER,
            'definition_id'=>  Schema::TYPE_INTEGER,
            'criteria_id'=>  Schema::TYPE_INTEGER,
            'scene_id'=>  Schema::TYPE_INTEGER,
        ]);
        $this->addForeignKey('fk_ml_databasedata', 'mission_local', 'databasedata_id', 'databasedata', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_ml_progzone', 'mission_local', 'progzone_id', 'progzone', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_ml_definition', 'mission_local', 'definition_id', 'definition', 'id', 'RESTRICT', 'CASCADE');
        $this->addForeignKey('fk_ml_criteria', 'mission_local', 'criteria_id', 'criteria', 'id', 'RESTRICT', 'CASCADE');
    }

    public function down() {
        echo "m140723_234649_mission_local cannot be reverted.\n";
        $this->dropTable('mission_local');
        $this->dropTable('criteria');
        $this->dropTable('definition');
        $this->dropTable('priority');
        $this->dropTable('progzone');
        $this->dropTable('request_status');
        return false;
    }

}

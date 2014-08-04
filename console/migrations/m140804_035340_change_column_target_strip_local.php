<?php

use yii\db\Schema;
use yii\db\Migration;

class m140804_035340_change_column_target_strip_local extends Migration {

    public function up() {
        $this->alterColumn('target_strip_local','lat_center',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('target_strip_local','lon_center',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('target_strip_local','altitude_center',  Schema::TYPE_STRING.'(100) NULL');
        
        $this->alterColumn('target_strip_local','strip_length',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('target_strip_local','strip_width',  Schema::TYPE_STRING.'(100) NULL');
        
        $this->alterColumn('target_strip_local','lat_corner_nw',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('target_strip_local','lon_corner_nw',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('target_strip_local','altitude_nw',  Schema::TYPE_STRING.'(100) NULL');
        
        $this->alterColumn('target_strip_local','lat_corner_ne',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('target_strip_local','lon_corner_ne',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('target_strip_local','altitude_ne',  Schema::TYPE_STRING.'(100) NULL');
        
        $this->alterColumn('target_strip_local','lat_corner_sw',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('target_strip_local','lon_corner_sw',  Schema::TYPE_STRING.'(100) NULL');
        $this->alterColumn('target_strip_local','altitude_sw',  Schema::TYPE_STRING.'(100) NULL');
        
        $this->alterColumn('target_strip_local','gain1',  Schema::TYPE_STRING.'(20) NULL');
        $this->alterColumn('target_strip_local','gain2',  Schema::TYPE_STRING.'(20) NULL');
        $this->alterColumn('target_strip_local','gain3',  Schema::TYPE_STRING.'(20) NULL');
        $this->alterColumn('target_strip_local','gain4',  Schema::TYPE_STRING.'(20) NULL');
        
        $this->addColumn('target_strip_local','trial_local_id',  Schema::TYPE_INTEGER);
    }

    public function down() {
        echo "m140804_035340_change_column_target_strip_local cannot be reverted.\n";

        return false;
    }

}

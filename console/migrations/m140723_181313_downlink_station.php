<?php

use yii\db\Schema;
use yii\db\Migration;

class m140723_181313_downlink_station extends Migration {

    public function up() {
        //options
        switch (Yii::$app->db->driverName) {
            case 'mysql':
                $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
                break;
            case 'pgsql':
                $tableOptions = null;
                break;
            default:
                throw new RuntimeException('Your database is not supported!');
        }
        $this->createTable('downlink_station',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(128) NOT NULL',
            'value'=> Schema::TYPE_INTEGER,
        ]);
        $this->insert('downlink_station',[
            ['name'=>'Bangkok','value'=>'0'],
            ['name'=>'Miyun','value'=>'1'],
        ]);
    }

    public function down() {
        echo "m140723_181313_downlink_station cannot be reverted.\n";
        $this->dropTable('downlink_station');
        return false;
    }

}

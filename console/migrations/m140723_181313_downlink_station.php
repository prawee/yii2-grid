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
        $this->insert('downlink_station',['name' => 'Bangkok', 'value' => '0']);
        $this->insert('downlink_station',['name' => 'Miyun', 'value' => '1']);
        $this->insert('downlink_station',['name' => 'Kashi', 'value' => '2']);
        $this->insert('downlink_station',['name' => 'Sanya', 'value' => '3']);
        $this->insert('downlink_station',['name' => 'Wuhan', 'value' => '4']);
        $this->insert('downlink_station',['name' => 'Peru', 'value' => '5']);
        $this->insert('downlink_station',['name' => 'Japan', 'value' => '6']);
        $this->insert('downlink_station',['name' => 'Kiruna', 'value' => '7']);
        $this->insert('downlink_station',['name' => 'Canada', 'value' => '8']);
        $this->insert('downlink_station',['name' => 'Taiwan', 'value' => '9']);
        $this->insert('downlink_station',['name' => 'Indonesia', 'value' => '10']);
        $this->insert('downlink_station',['name' => 'Malaysia', 'value' => '11']);
        $this->insert('downlink_station',['name' => 'Russia1', 'value' => '12']);
        $this->insert('downlink_station',['name' => 'Russia2', 'value' => '13']);
        $this->insert('downlink_station',['name' => 'Rissia3', 'value' => '14']);
        $this->insert('downlink_station',['name' => 'Rissia4', 'value' => '15']);
    }

    public function down() {
        echo "m140723_181313_downlink_station cannot be reverted.\n";
        $this->dropTable('downlink_station');
        return false;
    }

}

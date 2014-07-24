<?php

use yii\db\Schema;
use yii\db\Migration;

class m140724_065152_xml extends Migration {

    public function up() {
        $this->createTable('xml',[
            'id'=>  Schema::TYPE_PK,
            'name'=>  Schema::TYPE_STRING.'(255) NOT NULL',
            'path'=> Schema::TYPE_STRING.'(255) NULL',
            'send_email'=>  Schema::TYPE_BOOLEAN,
            'user_id'=>  Schema::TYPE_INTEGER,
            'scene_id'=>  Schema::TYPE_INTEGER,
            'status'=>  Schema::TYPE_BOOLEAN,
        ]);
        $this->addForeignKey('fk_xml_user','xml','user_id','user','id','RESTRICT','CASCADE');
    }

    public function down() {
        echo "m140724_065152_xml cannot be reverted.\n";
        $this->dropTable('xml');
        return false;
    }

}

<?php

//use yii\db\Schema;
use yii\db\Migration;

class m140731_112318_drop_column_dailyplan extends Migration
{
    public function up()
    {
        $this->dropColumn('dailyplan','scene_id');
    }

    public function down()
    {
        echo "m140731_112318_drop_column_dailyplan cannot be reverted.\n";   
        return false;
    }
}

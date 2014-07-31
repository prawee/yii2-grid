<?php

//use yii\db\Schema;
use yii\db\Migration;

class m140731_112053_drop_column_xml extends Migration
{
    public function up()
    {
        $this->dropColumn('xml','send_email');
    }

    public function down()
    {
        echo "m140731_112053_drop_column_xml cannot be reverted.\n";

        return false;
    }
}

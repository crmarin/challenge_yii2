<?php

use yii\db\Migration;

/**
 * Class m210203_220108_new_migration
 */
class m210203_220108_new_migration extends Migration
{
    public function up()
    {
        $this->addColumn('{{%oadode}}', 'lang', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('{{%oadode}}', 'lang');
    }
}

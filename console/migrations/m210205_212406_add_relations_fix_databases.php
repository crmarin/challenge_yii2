<?php

use yii\db\Migration;

/**
 * Class m210205_212406_add_relations_fix_databases
 */
class m210205_212406_add_relations_fix_databases extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $sql = "SET FOREIGN_KEY_CHECKS=0;";
        Yii::$app->db->createCommand($sql)->execute();

        $sql = "ALTER TABLE description_of_goods ADD oadode_id INT(11) NULL AFTER id;";
        Yii::$app->db->createCommand($sql)->execute();

        $sql = "ALTER TABLE description_of_goods DROP COLUMN customer_id;";
        Yii::$app->db->createCommand($sql)->execute();

        $sql = "ALTER TABLE description_of_goods DROP COLUMN application_id;";
        Yii::$app->db->createCommand($sql)->execute();

        $sql = "ALTER TABLE description_of_goods ADD CONSTRAINT fk_dog_1 FOREIGN KEY (oadode_id) REFERENCES oadode(id) ON DELETE NO ACTION ON UPDATE NO ACTION;";
        Yii::$app->db->createCommand($sql)->execute();

        $sql = "ALTER TABLE description_of_goods ADD CONSTRAINT fk_dog_2 FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION;";
        Yii::$app->db->createCommand($sql)->execute();

        $sql = "ALTER TABLE oadode ADD CONSTRAINT fk_ad_2 FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE NO ACTION ON UPDATE NO ACTION;";
        Yii::$app->db->createCommand($sql)->execute();

        $sql = "SET FOREIGN_KEY_CHECKS=1;";
        Yii::$app->db->createCommand($sql)->execute();
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210205_212406_add_relations_fix_databases cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210205_212406_add_relations_fix_databases cannot be reverted.\n";

        return false;
    }
    */
}

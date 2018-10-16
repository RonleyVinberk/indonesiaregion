<?php

use yii\db\Migration;

/**
 * Class m180929_105444_add_column_for_villages_table
 */
class m180929_105444_add_column_for_villages_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    /* public function safeUp()
    {

    } */

    /**
     * {@inheritdoc}
     */
    /* public function safeDown()
    {
        echo "m180929_105444_add_column_for_villages_table cannot be reverted.\n";

        return false;
    } */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('villages', 'created_on', $this->integer());
        $this->addColumn('villages', 'created_by', $this->integer());
        $this->addColumn('villages', 'modified_on', $this->integer());
        $this->addColumn('villages', 'modified_by', $this->integer());
    }

    public function down()
    {
        $this->dropColumn('villages', 'created_on', $this->integer());
        $this->dropColumn('villages', 'created_by', $this->integer());
        $this->dropColumn('villages', 'modified_on', $this->integer());
        $this->dropColumn('villages', 'modified_by', $this->integer());
    }
}
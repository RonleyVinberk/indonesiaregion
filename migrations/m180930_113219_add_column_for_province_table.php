<?php

use yii\db\Migration;

/**
 * Class m180930_113219_add_column_for_province_table
 */
class m180930_113219_add_column_for_province_table extends Migration
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
        echo "m180930_113219_add_column_for_province_table cannot be reverted.\n";

        return false;
    } */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
       $this->addColumn('provinces', 'created_on', $this->integer());
       $this->addColumn('provinces', 'created_by', $this->integer());
       $this->addColumn('provinces', 'modified_on', $this->integer());
       $this->addColumn('provinces', 'modified_by', $this->integer());
    }

    public function down()
    {
       $this->dropColumn('provinces', 'created_on', $this->integer());
       $this->dropColumn('provinces', 'created_by', $this->integer());
       $this->dropColumn('provinces', 'modified_on', $this->integer());
       $this->dropColumn('provinces', 'modified_by', $this->integer());
    }
}
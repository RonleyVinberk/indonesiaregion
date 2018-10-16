<?php

use yii\db\Migration;

/**
 * Class m180930_105343_add_column_for_subdistrict_table
 */
class m180930_105343_add_column_for_subdistrict_table extends Migration
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
        echo "m180930_105343_add_column_for_subdistrict_table cannot be reverted.\n";

        return false;
    } */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
       $this->addColumn('subdistricts', 'created_on', $this->integer());
       $this->addColumn('subdistricts', 'created_by', $this->integer());
       $this->addColumn('subdistricts', 'modified_on', $this->integer());
       $this->addColumn('subdistricts', 'modified_by', $this->integer());
    }

    public function down()
    {
       $this->dropColumn('subdistricts', 'created_on', $this->integer());
       $this->dropColumn('subdistricts', 'created_by', $this->integer());
       $this->dropColumn('subdistricts', 'modified_on', $this->integer());
       $this->dropColumn('subdistricts', 'modified_by', $this->integer());
    }
}
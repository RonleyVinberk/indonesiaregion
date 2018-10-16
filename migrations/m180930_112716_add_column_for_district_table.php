<?php

use yii\db\Migration;

/**
 * Class m180930_112716_add_column_for_district_table
 */
class m180930_112716_add_column_for_district_table extends Migration
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
        echo "m180930_112716_add_column_for_district_table cannot be reverted.\n";

        return false;
    } */

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
       $this->addColumn('districts', 'created_on', $this->integer());
       $this->addColumn('districts', 'created_by', $this->integer());
       $this->addColumn('districts', 'modified_on', $this->integer());
       $this->addColumn('districts', 'modified_by', $this->integer());
    }

    public function down()
    {
       $this->dropColumn('districts', 'created_on', $this->integer());
       $this->dropColumn('districts', 'created_by', $this->integer());
       $this->dropColumn('districts', 'modified_on', $this->integer());
       $this->dropColumn('districts', 'modified_by', $this->integer());
    }
}
<?php

use yii\db\Migration;

/**
 * Class m181001_165233_create_table_dep_drop
 */
class m181001_165233_create_table_dep_drop extends Migration
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
        echo "m181001_165233_create_table_dep_drop cannot be reverted.\n";

        return false;
    } */

    
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('depdrops', [
            'id' => $this->primaryKey(),
            'villages_id' => $this->integer(),
            'subdistricts_id' => $this->integer(),
            'districts_id' => $this->integer(),
            'provinces_id' => $this->integer(),
        ]);

        $this->addForeignKey(
            'fk_depdrops_village',
            'depdrops', 'villages_id',
            'villages', 'id',
            'restrict', 'cascade'
        );

        $this->addForeignKey(
            'fk_depdrops_subdistrict',
            'depdrops', 'subdistricts_id',
            'subdistricts', 'id',
            'restrict', 'cascade'
        );

        $this->addForeignKey(
            'fk_depdrops_district',
            'depdrops', 'districts_id',
            'districts', 'id',
            'restrict', 'cascade'
        );

        $this->addForeignKey(
            'fk_depdrops_province',
            'depdrops', 'provinces_id',
            'provinces', 'id',
            'restrict', 'cascade'
        );
    }

    public function down()
    {
        $this->dropTable('depdrops');
    }
}
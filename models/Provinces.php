<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provinces".
 *
 * @property int $id
 * @property string $name
 * @property int $created_on
 * @property int $created_by
 * @property int $modified_on
 * @property int $modified_by
 *
 * @property Districts[] $districts
 */
class Provinces extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'provinces';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_on', 'created_by', 'modified_on', 'modified_by'], 'integer'],
            [['name'], 'string', 'max' => 25],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_on' => 'Created On',
            'created_by' => 'Created By',
            'modified_on' => 'Modified On',
            'modified_by' => 'Modified By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasMany(Districts::className(), ['province_id' => 'id']);
    }
}

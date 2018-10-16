<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subdistricts".
 *
 * @property int $id
 * @property int $district_id
 * @property string $name
 * @property int $created_on
 * @property int $created_by
 * @property int $modified_on
 * @property int $modified_by
 *
 * @property Districts $district
 * @property Villages[] $villages
 */
class Subdistricts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subdistricts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['district_id', 'created_on', 'created_by', 'modified_on', 'modified_by'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['district_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['district_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'district_id' => 'District ID',
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
    public function getDistrict()
    {
        return $this->hasOne(Districts::className(), ['id' => 'district_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVillages()
    {
        return $this->hasMany(Villages::className(), ['subdistrict_id' => 'id']);
    }
}

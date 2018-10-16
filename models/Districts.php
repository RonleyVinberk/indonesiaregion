<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "districts".
 *
 * @property int $id
 * @property int $province_id
 * @property string $name
 * @property int $created_on
 * @property int $created_by
 * @property int $modified_on
 * @property int $modified_by
 *
 * @property Provinces $province
 * @property Subdistricts[] $subdistricts
 */
class Districts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'districts';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['province_id', 'created_on', 'created_by', 'modified_on', 'modified_by'], 'integer'],
            [['name'], 'string', 'max' => 35],
            [['province_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinces::className(), 'targetAttribute' => ['province_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'province_id' => 'Province ID',
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
    public function getProvince()
    {
        return $this->hasOne(Provinces::className(), ['id' => 'province_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubdistricts()
    {
        return $this->hasMany(Subdistricts::className(), ['district_id' => 'id']);
    }
}

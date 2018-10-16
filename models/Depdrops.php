<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "depdrops".
 *
 * @property int $id
 * @property int $villages_id
 * @property int $subdistricts_id
 * @property int $districts_id
 * @property int $provinces_id
 *
 * @property Districts $districts
 * @property Provinces $provinces
 * @property Subdistricts $subdistricts
 * @property Villages $villages
 */
class Depdrops extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'depdrops';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['villages_id', 'subdistricts_id', 'districts_id', 'provinces_id'], 'integer'],
            [['districts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Districts::className(), 'targetAttribute' => ['districts_id' => 'id']],
            [['provinces_id'], 'exist', 'skipOnError' => true, 'targetClass' => Provinces::className(), 'targetAttribute' => ['provinces_id' => 'id']],
            [['subdistricts_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subdistricts::className(), 'targetAttribute' => ['subdistricts_id' => 'id']],
            [['villages_id'], 'exist', 'skipOnError' => true, 'targetClass' => Villages::className(), 'targetAttribute' => ['villages_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'villages_id' => 'Villages ID',
            'subdistricts_id' => 'Subdistricts ID',
            'districts_id' => 'Districts ID',
            'provinces_id' => 'Provinces ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDistricts()
    {
        return $this->hasOne(Districts::className(), ['id' => 'districts_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvinces()
    {
        return $this->hasOne(Provinces::className(), ['id' => 'provinces_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubdistricts()
    {
        return $this->hasOne(Subdistricts::className(), ['id' => 'subdistricts_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVillages()
    {
        return $this->hasOne(Villages::className(), ['id' => 'villages_id']);
    }
}
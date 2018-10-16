<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "villages".
 *
 * @property int $id
 * @property int $subdistrict_id
 * @property string $name
 * @property int $created_on
 * @property int $created_by
 * @property int $modified_on
 * @property int $modified_by
 *
 * @property Subdistricts $subdistrict
 */
class Villages extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'villages';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['subdistrict_id', 'created_on', 'created_by', 'modified_on', 'modified_by'], 'integer'],
            [['name'], 'string', 'max' => 30],
            [['subdistrict_id'], 'exist', 'skipOnError' => true, 'targetClass' => Subdistricts::className(), 'targetAttribute' => ['subdistrict_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'subdistrict_id' => 'Subdistrict ID',
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
    public function getSubdistrict()
    {
        return $this->hasOne(Subdistricts::className(), ['id' => 'subdistrict_id']);
    }
}
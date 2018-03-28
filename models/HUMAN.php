<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "HUMAN".
 *
 * @property int $HUMAN_ID
 * @property string $NAME
 * @property string $BIRTHDAY
 * @property string $ADDRESS
 * @property string $PHONE
 * @property string $EMAIL
 * @property string $NOTE
 * @property resource $IMAGE
 *
 * @property MUSIC[] $mUSICs
 * @property MUSIC[] $mUSICs0
 * @property MUSICUSER[] $mUSICUSERs
 */
class HUMAN extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'HUMAN';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'ADDRESS', 'PHONE', 'EMAIL', 'NOTE', 'IMAGE'], 'string'],
            [['BIRTHDAY'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'HUMAN_ID' => 'Human  ID',
            'NAME' => 'Name',
            'BIRTHDAY' => 'Birthday',
            'ADDRESS' => 'Address',
            'PHONE' => 'Phone',
            'EMAIL' => 'Email',
            'NOTE' => 'Note',
            'IMAGE' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUSICs()
    {
        return $this->hasMany(MUSIC::className(), ['SINGER_ID' => 'HUMAN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUSICs0()
    {
        return $this->hasMany(MUSIC::className(), ['AUTHOR_ID' => 'HUMAN_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUSICUSERs()
    {
        return $this->hasMany(MUSICUSER::className(), ['HUMAN_ID' => 'HUMAN_ID']);
    }
}

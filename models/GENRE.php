<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "GENRE".
 *
 * @property int $GENRE_ID
 * @property string $NAME
 * @property string $NOTE
 *
 * @property ALBUM[] $aLBUMs
 * @property MUSIC[] $mUSICs
 */
class GENRE extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'GENRE';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NAME', 'NOTE'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'GENRE_ID' => 'Genre  ID',
            'NAME' => 'Name',
            'NOTE' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getALBUMs()
    {
        return $this->hasMany(ALBUM::className(), ['GENRE_ID' => 'GENRE_ID']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUSICs()
    {
        return $this->hasMany(MUSIC::className(), ['GENRE_ID' => 'GENRE_ID']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "LYRICS".
 *
 * @property int $LYRICS_ID
 * @property string $NOTE
 * @property string $CONTENT
 * @property int $MUSIC_ID
 *
 * @property MUSIC $mUSIC
 */
class LYRICS extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'LYRICS';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['NOTE', 'CONTENT'], 'string'],
            [['MUSIC_ID'], 'integer'],
            [['MUSIC_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MUSIC::className(), 'targetAttribute' => ['MUSIC_ID' => 'MUSIC_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'LYRICS_ID' => 'Lyrics  ID',
            'NOTE' => 'Note',
            'CONTENT' => 'Content',
            'MUSIC_ID' => 'Music  ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUSIC()
    {
        return $this->hasOne(MUSIC::className(), ['MUSIC_ID' => 'MUSIC_ID']);
    }
}

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "HISTORY".
 *
 * @property int $HISTORY_ID
 * @property int $TOTAL_VIEW
 * @property string $VIEW_DATE
 * @property int $MUSIC_ID
 *
 * @property MUSIC $mUSIC
 */
class HISTORY extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'HISTORY';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['TOTAL_VIEW', 'MUSIC_ID'], 'integer'],
            [['VIEW_DATE'], 'safe'],
            [['MUSIC_ID'], 'exist', 'skipOnError' => true, 'targetClass' => MUSIC::className(), 'targetAttribute' => ['MUSIC_ID' => 'MUSIC_ID']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'HISTORY_ID' => 'History  ID',
            'TOTAL_VIEW' => 'Total  View',
            'VIEW_DATE' => 'View  Date',
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

<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "TITLE".
 *
 * @property int $TITLE_ID
 * @property string $NAME
 * @property string $NOTE
 *
 * @property MUSIC[] $mUSICs
 */
class TITLE extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'TITLE';
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
            'TITLE_ID' => 'Title  ID',
            'NAME' => 'Name',
            'NOTE' => 'Note',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMUSICs()
    {
        return $this->hasMany(MUSIC::className(), ['TITLE_ID' => 'TITLE_ID']);
    }
}

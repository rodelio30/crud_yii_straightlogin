<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int|null $created_by
 */
class Inventory extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            // [['created_by'], 'integer'],

            // ensure empty values are stored as NULL in the database
            ['created_by', 'default', 'value' => null],

            // validate the date and overwrite `created_by` with the unix timestamp
            ['created_by', 'date', 'timestampAttribute' => 'created_by'],

            [['name'], 'string', 'max' => 255],

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
            'description' => 'Description',
            'created_by' => 'Created By',
        ];
    }
}

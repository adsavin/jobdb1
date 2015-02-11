<?php

/**
 * This is the model base class for the table "items".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Items".
 *
 * Columns in table "items" available as properties of the model,
 * followed by relations of table "items" available as properties of the model.
 *
 * @property string $name
 * @property integer $type
 * @property string $description
 * @property string $bizrule
 * @property string $data
 *
 * @property Assignments[] $assignments
 * @property Itemchildren[] $itemchildrens
 * @property Itemchildren[] $itemchildrens1
 */
abstract class BaseItems extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'items';
    }

    public static function representingColumn() {
        return 'name';
    }

    public function rules() {
        return array(
            array('name, type', 'required'),
            array('type', 'numerical', 'integerOnly'=>true),
            array('name', 'length', 'max'=>64),
            array('description, bizrule, data', 'safe'),
            array('description, bizrule, data', 'default', 'setOnEmpty' => true, 'value' => null),
            array('name, type, description, bizrule, data', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'assignments' => array(self::HAS_MANY, 'Assignments', 'itemname'),
            'itemchildrens' => array(self::HAS_MANY, 'Itemchildren', 'parent'),
            'itemchildrens1' => array(self::HAS_MANY, 'Itemchildren', 'child'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'name' => Yii::t('app', 'Name'),
                'type' => Yii::t('app', 'Type'),
                'description' => Yii::t('app', 'Description'),
                'bizrule' => Yii::t('app', 'Bizrule'),
                'data' => Yii::t('app', 'Data'),
                'assignments' => null,
                'itemchildrens' => null,
                'itemchildrens1' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('name', $this->name, true);
        $criteria->compare('type', $this->type);
        $criteria->compare('description', $this->description, true);
        $criteria->compare('bizrule', $this->bizrule, true);
        $criteria->compare('data', $this->data, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}
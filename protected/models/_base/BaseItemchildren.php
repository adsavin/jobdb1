<?php

/**
 * This is the model base class for the table "itemchildren".
 * DO NOT MODIFY THIS FILE! It is automatically generated by AweCrud.
 * If any changes are necessary, you must set or override the required
 * property or method in class "Itemchildren".
 *
 * Columns in table "itemchildren" available as properties of the model,
 * followed by relations of table "itemchildren" available as properties of the model.
 *
 * @property string $parent
 * @property string $child
 *
 * @property Items $parent0
 * @property Items $child0
 */
abstract class BaseItemchildren extends AweActiveRecord {

    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    public function tableName() {
        return 'itemchildren';
    }

    public static function representingColumn() {
        return 'parent';
    }

    public function rules() {
        return array(
            array('parent, child', 'required'),
            array('parent, child', 'length', 'max'=>64),
            array('parent, child', 'safe', 'on'=>'search'),
        );
    }

    public function relations() {
        return array(
            'parent0' => array(self::BELONGS_TO, 'Items', 'parent'),
            'child0' => array(self::BELONGS_TO, 'Items', 'child'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
                'parent' => Yii::t('app', 'Parent'),
                'child' => Yii::t('app', 'Child'),
                'parent0' => null,
                'child0' => null,
        );
    }

    public function search() {
        $criteria = new CDbCriteria;

        $criteria->compare('parent', $this->parent);
        $criteria->compare('child', $this->child);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function behaviors() {
        return array_merge(array(
        ), parent::behaviors());
    }
}
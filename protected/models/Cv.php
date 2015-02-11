<?php

Yii::import('application.models._base.BaseCv');

class Cv extends BaseCv {

    /**
     * @return Cv
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public static function label($n = 1) {
        return Yii::t('cv', 'Cv|Cvs', $n);
    }

    public function attributeLabels() {
        return array_merge(parent::attributeLabels(), array(
            'id' => Yii::t('cv', 'ID'),
            'title' => Yii::t('cv', 'Title'),
            'name' => Yii::t('cv', 'Name'),
            'surname' => Yii::t('cv', 'Surname'),
            'birthdate' => Yii::t('cv', 'Birthdate'),
            'contact_number' => Yii::t('cv', 'Contact Number'),
            'email' => Yii::t('cv', 'Email'),
            'district' => Yii::t('cv', 'District'),
            'major' => Yii::t('cv', 'Major'),
            'graduated_year' => Yii::t('cv', 'Graduated Year'),
            'language' => Yii::t('cv', 'Language'),
            'language_level' => Yii::t('cv', 'Language Level'),
            'experience' => Yii::t('cv', 'Experience'),
            'job_function_year' => Yii::t('cv', 'Job Function Year'),
            'computer_skill' => Yii::t('cv', 'Computer Skill'),
            'salary_min' => Yii::t('cv', 'Salary Min'),
            'salary_max' => Yii::t('cv', 'Salary Max'),
            'country_id' => Yii::t('cv', 'Country'),
            'province_id' => Yii::t('cv', 'Province'),
            'nationality_id' => Yii::t('cv', 'Nationality'),
            'highest_edu_level_id' => Yii::t('cv', 'Highest Education Level'),
            'user_id' => Yii::t('cv', 'User'),
            'graduated_country_id' => Yii::t('cv', 'Graduated Country'),
            'status' => Yii::t('cv', 'Status'),
            'is_lock' => Yii::t('cv', 'Locked'),
            'experience' => Yii::t('cv', 'Total Experience'),
            "job_function_year" => Yii::t("app", "How many years of Major works function?"),
        ));
    }

    public function rules() {
        return array_merge(parent::rules(), array(
            array('experience, job_function_year', 'length', 'max' => 2),
            array("graduated_year", 'length', 'max' => 4),
        ));
    }

    protected function beforeValidate() {
        $this->user_id = Yii::app()->user->id;
        $this->status = str_replace("'", "", $this->status);
        
        return parent::beforeValidate();
    }        

}

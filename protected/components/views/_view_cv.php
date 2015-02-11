<div class="row-fluid">
    <div class="span2">
        <?=
        isset($data->photo) ?
                CHtml::image(Yii::app()->params["cvProfileDir"] . $data->photo, $data->name, array(
                    "class" => "thumbnail"
                )) :
                CHtml::image("images/no_image_available.jpg", "", array(
                    "class" => "thumbnail",
//                    "style" => "max-height: 200px;"
        ));
        ?>
    </div>
    <div class="span5">
        <p>
            <?= CHtml::encode($data->getAttributeLabel('title')); ?>:
            <b><?= CHtml::encode($data->title); ?></b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('name')); ?>:
            <b><?= CHtml::encode($data->name); ?></b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('surname')); ?>:
            <b><?= CHtml::encode($data->surname); ?></b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('birthdate')); ?>:
            <b><?= CHtml::encode($data->birthdate); ?></b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('contact_number')); ?>:
            <b><?= $data->is_lock == 'N' ? CHtml::encode($data->contact_number) : ""; ?></b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('email')); ?>:
            <b><?= $data->is_lock == 'N' ? CHtml::encode($data->email) : ""; ?></b>
        </p>
    </div>
    <div class="span5">
        <p>
            <?= CHtml::encode($data->getAttributeLabel('highest_edu_level_id')); ?>:
            <b><?= CHtml::encode($data->highestEduLevel->name); ?></b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('major')); ?>:
            <b><?= CHtml::encode($data->major); ?></b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('graduated_year')); ?>:
            <b><?= CHtml::encode($data->graduated_year); ?></b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('experience')); ?>:
            <b><?= CHtml::encode($data->experience) . " " . Yii::t("app", "Year(s)"); ?> </b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('language')); ?>:
            <b><?= CHtml::encode($data->language) . " (" . CHtml::encode($data->language_level) . ")"; ?> </b>
        </p>
        <p>
            <?= CHtml::encode($data->getAttributeLabel('computer_skill')); ?>:
            <b><?= CHtml::encode($data->computer_skill); ?> </b>
        </p>
    </div>
</div>
<hr>
<?php

if (isset($model)) {
    echo $model->content;

    if (strstr($model->widget, "map")) {
        $this->widget("StaticmapWidget");
    }
    if (strstr($model->widget, "contact_form")) {
        $this->renderPartial('contact', array('model' => new ContactForm()));
    }
}
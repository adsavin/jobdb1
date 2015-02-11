<?php
$this->beginWidget("bootstrap.widgets.TbBox", array(
    "title" => Yii::t("app", "Chat with Us"),
    "htmlHeaderOptions" => array(
        "class" => "box-header"
    ),
));
?>
<div id='chat'></div>
<?php
$this->widget('YiiChatWidget', array(
    'chat_id' => '123', // a chat identificator
    'identity' => 1, // the user, Yii::app()->user->id ?
    'selector' => '#chat', // were it will be inserted
    'minPostLen' => 2, // min and
    'maxPostLen' => 10, // max string size for post
//                    'model' => new MyYiiChatHandler(), // the class handler. **** FOR DEMO, READ MORE LATER IN THIS DOC ****
    'model' => new ChatHandler(), // the class handler using database
    'data' => 'any data', // data passed to the handler
    // success and error handlers, both optionals.
    'onSuccess' => new CJavaScriptExpression(
            "function(code, text, post_id){   }"),
    'onError' => new CJavaScriptExpression(
            "function(errorcode, info){  }"),
));
$this->endWidget();
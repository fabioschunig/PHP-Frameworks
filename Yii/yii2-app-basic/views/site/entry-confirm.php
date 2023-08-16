<?php

// Working with Forms
// https://www.yiiframework.com/doc/guide/2.0/en/start-forms

use yii\helpers\Html;

?>

<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Email</label>: <?= Html::encode($model->email) ?></li>
</ul>
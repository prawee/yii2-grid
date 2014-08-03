<?php

//use yii\helpers\Html;

$this->title = 'Create Xml';
//$this->params['breadcrumbs'][] = ['label' => 'Xmls', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="xml-create">
    <?=
    $this->render('_form', [
        'model' => $model,
    ])
    ?>

</div>

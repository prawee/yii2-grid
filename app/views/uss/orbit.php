<?php

$this->title = 'Orbit';
$this->params['breadcrumbs'][] = $this->title;

Modal::begin([
    'id' => 'content-modal',
    'header' => Icon::show('info') . '<b>Orbit</b>',
    'closeButton' => [
        'aria-hidden' => 'true',
        'class' => 'hide',
    ],
]);
?>
<div class="uss-orbit-index">
</div>
<?php
Modal::end();
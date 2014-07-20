<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;
use kartik\icons\Icon;
Icon::map($this);

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                //'brandLabel' => 'My Company',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                ['label' => Icon::show('th-list').' Request Analysis', 'url' => ['/uss/index']],
//                ['label' => Icon::show('th').' Daily Plan', 'url' => ['/dailyplan/index']],
//                ['label' => Icon::show('th-large').' Satellite Usage', 'url' => ['/satellite/index']],
//                ['label' => Icon::show('barcode').' CUF', 'url' => ['/cuf/index']],
//                ['label' => Icon::show('envelope').' Mail', 'url' => ['/mail/index']],
//                ['label' => Icon::show('user').' User Management', 'url' => ['/user/index']],
//                ['label' => Icon::show('cog').' Settings', 'url' =>'#','items'=>[
//                    ['label' => 'Request Status', 'url' => ['/request/status']],
//                    ['label' => 'Downlink Station', 'url' => ['/downlink/index']],
//                    ['label' => 'Priority', 'url' => ['/priority/index']],
//                    ['label' => 'Strip Status', 'url' => ['/strip/index']],
//                ]],
            ];
            
            $menuItemsRight=[];
            if (Yii::$app->user->isGuest) {
                $menuItemsRight[] = ['label' =>Icon::show('sign-in').' Login', 'url' => ['/auth/default/login']];
            } else {
                $menuItemsRight[] = ['label' =>Icon::show('user').' Profile', 'url' => ['/auth/user/profile']];
                $menuItemsRight[] = [
                    'label' =>Icon::show('power-off').' Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/auth/default/logout'],
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right pull-left'],
                'items' => $menuItems,
                'encodeLabels'=>false,
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right pull-right'],
                'items' => $menuItemsRight,
                'encodeLabels'=>false,
            ]);
            NavBar::end();
            ?>

            <div class="container">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; My Company <?= date('Y') ?></p>
                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>

<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\Alert;

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
                ['label' => 'Request Analysis', 'url' => ['/request/index']],
                ['label' => 'Daily Plan', 'url' => ['/dailyplan/index']],
                ['label' => 'Satellite Usage', 'url' => ['/satellite/index']],
                ['label' => 'CUF', 'url' => ['/cuf/index']],
                ['label' => 'Mail', 'url' => ['/mail/index']],
                ['label' => 'User Management', 'url' => ['/user/index']],
                ['label' => 'Settings', 'url' =>'#','items'=>[
                    ['label' => 'Request Status', 'url' => ['/request/status']],
                    ['label' => 'Downlink Station', 'url' => ['/downlink/index']],
                    ['label' => 'Priority', 'url' => ['/priority/index']],
                    ['label' => 'Strip Status', 'url' => ['/strip/index']],
                ]],
            ];
            
            $menuItemsRight=[];
            if (Yii::$app->user->isGuest) {
                $menuItemsRight[] = ['label' => 'Login', 'url' => ['/site/login']];
            } else {
                $menuItemsRight[] = ['label' => 'Profile', 'url' => ['/user/profile']];
                $menuItemsRight[] = [
                    'label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/site/logout'],
                ];
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right pull-left'],
                'items' => $menuItems,
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right pull-right'],
                'items' => $menuItemsRight,
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

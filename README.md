yii2-gridview
=============

Manage Yii2 GridView


Installation:
=============
Command run
```php
$ php composer.phar require prawee/yii2-grid "dev-master"
```

or add to composer.json on require path.
```php
"prawee/yii2-grid": "dev-master"
```

ActionColumn
============
on gridview
....
[
    'class'=>'prawee\grid\ActionColumn',
],
.....

ImageColumn
===========
on gridview
....
[
    'class'=>'prawee\grid\ImageColumn',
    'attribute'=>'image',
    'options'=>[
        'width'=>'40px',
    ],
],
....
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
```php
....
[
    'class'=>'prawee\grid\ActionColumn',
],
.....
```

ImageColumn
===========
on gridview
```php
....
[
    'class'=>'prawee\grid\ImageColumn',
    'attribute'=>'image',
    'options'=>[
        'width'=>'40px',
    ],
],
....
```

ActionChildColumn
=================
on gridview
```php
...
[
    'class'=>'prawee\grid\ActionChildColumn',
],
...
```

support multi param
```php
...
[
    'class'=>'prawee\grid\ActionChildColumn',
    'params'=>[
        'ref'=>Yii::$app->getRequest()->get('id'),
        'station'=>2,
    ],
],
...
```
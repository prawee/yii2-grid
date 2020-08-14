# Extends grid classes for Yii2 and Bootstrap 4

## Contains

- ActionAuthColumn
- ActionChildColumn
- ActionColumn
- ActionRuleColumn
- ImageColumn
- MediaColumn

## Installation

on your terminal run this command

```php
php composer.phar require prawee/yii2-grid "dev-master"
```

or add to composer.json on require path.

```php
"prawee/yii2-grid": "dev-master"
```

## Usage

### ActionColumn

on your grid

```php
....
[
    'class'=>'prawee\grid\ActionColumn',
],
.....
```

#### ImageColumn

on your grid

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

#### ActionChildColumn

on your grid

```php
...
[
    'class'=>'prawee\grid\ActionChildColumn',
],
...
```

or it have child that's support multi param

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

#### MediaColumn

on your grid

```php
....
[
    'class'=>'prawee\grid\MediaColumn',
    'attribute'=>'name',
    'format'=>'image', #image,video
    'options'=>[
        'width'=>'40px',
    ],
],
....
```

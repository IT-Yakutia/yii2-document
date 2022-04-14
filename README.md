Document service for yii2
=====================
Document server for yii2

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```sh
php composer.phar require --prefer-dist it-yakutia/yii2-document "*"
```

or add

```json
"it-yakutia/yii2-document": "*"
```

to the require section of your `composer.json` file.

Add migration path in your console config file:

```php
'controllerMap' => [
    ...
    'migrate' => [
    ...
        'migrationPath' => [
            ...
            '@ityakutia/document/migrations',
        ],
    ],
]

```
Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?= Url::toRoute(['/document/back/index']); ?>
```

Use in frontend:
```php
<?= \ityakutia\document\widgets\document\DocumentWidget::widget(); ?>
```

Add RBAC roles:

```
document
```

Add fixtures:
```sh
php yii fixture Document --namespace='ityakutia\document\tests\fixtures'
```

Add fixtures in docker:
```sh
php yii fixture Document --namespace='ityakutia\document\tests\fixtures' --interactive=0
```


```php
'custom_view_for_modules' => [
    'document_front' => [
        'index' => '@frontend/views/front_page/index',
        '_item' => '@frontend/views/front_page/_item',
    ],
],
```
<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var biz\purchase\models\PurchaseSearch $searchModel
 */
$this->title = 'Receive';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="purchase-hdr-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php Pjax::begin(['formSelector' => 'form', 'enablePushState' => false]); ?>

    <?php
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'tableOptions' => ['class' => 'table table-striped'],
        'layout' => '{items}{pager}',
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'transfer_num',
            'idWarehouseSource.nm_whse',
            'idWarehouseDest.nm_whse',
            'transferDate',
            'nmStatus',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {receive}',
                'buttons' => [
                    'receive' => function ($url, $model) {
                    return Html::a('<span class="glyphicon glyphicon-save"></span>', $url, [
                            'title' => Yii::t('yii', 'Receive'),
                            'data-confirm' => Yii::t('yii', 'Are you sure you want to receive this item?'),
                            'data-method' => 'post',
                            'data-pjax' => '0',
                    ]);
                }
                ]
            ],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use biz\inventory\models\Transfer;

/**
 * @var yii\web\View $this
 * @var biz\inventory\models\Transfer $model
 */
$this->title = $model->transfer_num;
$this->params['breadcrumbs'][] = ['label' => 'Receive', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="purchase-hdr-view col-lg-9">
    <?php
    echo yii\grid\GridView::widget([
        'tableOptions' => ['class' => 'table table-striped'],
        'layout' => '{items}{pager}',
        'dataProvider' => new \yii\data\ActiveDataProvider([
            'query' => $model->getTransferDtls(),
            'sort' => false,
            'pagination' => false,
            ]),
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'idProduct.nm_product',
            'transfer_qty_send',
            'transfer_qty_receive',
            ['header' => 'Selisih', 'value' => function ($model) {
                return $model->transfer_qty_receive - $model->transfer_qty_send;
            }],
            'idUom.nm_uom',
        ]
    ]);
    ?>
</div>
<div class="col-lg-3" style="padding-left: 0px;">
    <div class="panel panel-primary">
        <div class="panel-heading">
            Receive Header
        </div>
        <?php
        echo DetailView::widget([
            'options' => ['class' => 'table table-striped detail-view', 'style' => 'padding:0px;'],
            'model' => $model,
            'attributes' => [
                'transfer_num',
                'idWarehouseSource.nm_whse',
                'idWarehouseDest.nm_whse',
                'transferDate',
                'nmStatus',
            ],
        ]);
        ?>
    </div>
    <?php
    if ($model->status == Transfer::STATUS_ISSUE or $model->status == Transfer::STATUS_DRAFT_RECEIVE) {
        echo Html::a('Update', ['update', 'id' => $model->id_transfer], ['class' => 'btn btn-primary']) . ' ';
    }
    if ($model->status == Transfer::STATUS_DRAFT_RECEIVE) {
        echo Html::a('Receive', ['receive', 'id' => $model->id_transfer], [
            'class' => 'btn btn-primary',
            'data-confirm' => Yii::t('app', 'Are you sure to receive this item?'),
            'data-method' => 'post',
        ]);
    }
    ?>
</div>

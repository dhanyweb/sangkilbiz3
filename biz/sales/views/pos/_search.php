<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var biz\sales\models\SalesSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sales-hdr-search">

	<?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

		<?= $form->field($model, 'id_sales') ?>

		<?= $form->field($model, 'sales_num') ?>

		<?= $form->field($model, 'id_warehouse') ?>

		<?= $form->field($model, 'id_customer') ?>

		<?= $form->field($model, 'update_by') ?>

		<?php // echo $form->field($model, 'update_at') ?>

		<?php // echo $form->field($model, 'create_by') ?>

		<?php // echo $form->field($model, 'create_at') ?>

		<?php // echo $form->field($model, 'sales_date') ?>

		<div class="form-group">
			<?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
			<?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
		</div>

	<?php ActiveForm::end(); ?>

</div>

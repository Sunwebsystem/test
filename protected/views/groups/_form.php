<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'groups-form',
	'enableAjaxValidation' => false,
));
?>

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model, 'name', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'name'); ?>
		</div><!-- row -->
		<?php /*<div class="row">
		<?php echo $form->labelEx($model,'is_active'); ?>
		<?php echo $form->textField($model, 'is_active'); ?>
		<?php echo $form->error($model,'is_active'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'extra'); ?>
		<?php echo $form->textField($model, 'extra', array('maxlength' => 255)); ?>
		<?php echo $form->error($model,'extra'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'created'); ?>
		<?php echo $form->textField($model, 'created'); ?>
		<?php echo $form->error($model,'created'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'modified'); ?>
		<?php echo $form->textField($model, 'modified'); ?>
		<?php echo $form->error($model,'modified'); ?>
		</div><!-- row -->
                 * 
                 */?>


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
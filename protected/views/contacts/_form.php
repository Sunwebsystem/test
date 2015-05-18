<div class="form">


<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'contacts-form',
	'enableAjaxValidation' => false,
        'enableClientValidation'=>true,
    'clientOptions'=>array('validateOnSubmit'=>true)
));
?>
    

	<p class="note">
		<?php echo Yii::t('app', 'Fields with'); ?> <span class="required">*</span> <?php echo Yii::t('app', 'are required'); ?>.
	</p>

	<?php echo $form->errorSummary($model); ?>

		<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
                    <?php 
                        $groups = Groups::model()->findAll();
                        if(!empty($groups)){
                            foreach($groups as $group){
                                $grouplist[$group->id] = $group->name;
                                //pr($group->attributes);
                            }
                        }
                    ?>
		<?php echo $form->dropDownList($model, 'group_id',$grouplist,array('empty'=>'Please select group name')); ?>
		<?php echo $form->error($model,'group_id'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model, 'firstname', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'firstname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'lastname'); ?>
		<?php echo $form->textField($model, 'lastname', array('maxlength' => 50)); ?>
		<?php echo $form->error($model,'lastname'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'contact_no'); ?>
		<?php echo $form->textField($model, 'contact_no', array('maxlength' => 20)); ?>
		<?php echo $form->error($model,'contact_no'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model, 'email', array('maxlength' => 100)); ?>
		<?php echo $form->error($model,'email'); ?>
		</div><!-- row -->
		</div><!-- row -->


<?php
echo GxHtml::submitButton(Yii::t('app', 'Save'));
$this->endWidget();
?>
</div><!-- form -->
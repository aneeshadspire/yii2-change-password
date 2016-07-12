<?php 
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Change Password';
$this->params['breadcrumbs'][] = $this->title;
$this->params['pass'] = 'active opened active';
?>
            <div class="row">
                <div class="col-md-12">

                            <h2 class="panel-title"><strong><?= Html::encode($this->title) ?></strong></h2>

                            <?php $form = ActiveForm::begin([
                                'id'=>'changepassword-form',
                                'options'=>['class'=>'form-horizontal'],
                                'fieldConfig'=>[
                                    'template'=>"{label}\n<div class=\"col-lg-3\">
                                                {input}</div>\n<div class=\"col-lg-5\">
                                                {error}</div>",
                                    'labelOptions'=>['class'=>'col-lg-2 control-label'],
                                ],
                            ]); ?>
                                <?= $form->field($model,'oldpass',['inputOptions'=>[
                                    'placeholder'=>'Old Password'
                                ]])->passwordInput() ?>
                                
                                <?= $form->field($model,'newpass',['inputOptions'=>[
                                    'placeholder'=>'New Password'
                                ]])->passwordInput() ?>
                                
                                <?= $form->field($model,'repeatnewpass',['inputOptions'=>[
                                    'placeholder'=>'Repeat New Password'
                                ]])->passwordInput() ?>
                                
                                <div class="form-group">
                                    <div class="col-lg-offset-2 col-lg-4">
                                        <?= Html::submitButton('Change password',[
                                            'class'=>'btn btn-primary'
                                        ]) ?>
                                    </div>
                                </div>
                            <?php ActiveForm::end(); ?>
                </div>
            </div>

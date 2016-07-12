<?php 
namespace backend\modules\changepass\models;
use Yii;
use yii\base\Model;
use common\models\User;
    
class PasswordForm extends Model
{
        public $oldpass;
        public $newpass;
        public $repeatnewpass;
        
        public function rules()
        {
            return [
                [['oldpass','newpass','repeatnewpass'],'required'],
                ['oldpass','findPasswords'],
                ['newpass', 'match', 'pattern' => '/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/', 'message' => 'Your password should contain atleast one number and one special character and it should be minimum 6'],
                ['repeatnewpass', 'match', 'pattern' => '/^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{6,16}$/', 'message' => 'Your password should contain atleast one number and one special character and it should be minimum 6'],
               // ['newpass','string','min' => 6],
                ['repeatnewpass','compare','compareAttribute'=>'newpass'],

            ];
        }
        
        public function findPasswords($attribute, $params)
        {
            $user = User::find()->where([
                'username'=>Yii::$app->user->identity->username
            ])->one();
             $password = $user->password_hash;
            if(!Yii::$app->security->validatePassword($this->oldpass, $password))
                $this->addError($attribute,'Old password is incorrect');
        }
        
        public function attributeLabels()
        {
            return [
                'oldpass'=>'Old Password',
                'newpass'=>'New Password',
                'repeatnewpass'=>'Repeat New Password',
            ];
        }
}
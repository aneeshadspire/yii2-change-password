This is change password module
Set UP
1. Copy the "changepass" folder to the module directory in frontend or backend or both
2. Then add this module to the common/config/main.php file as below
	//if you are on the backend then
    	'modules' => [
        	'changepass' => [
           		 'class' => 'backend\modules\changepass\changepass',
        	],
    	],

	//if you are on the frontend then
	'modules' => [
        	'changepass' => [
            		'class' => 'frontend\modules\changepass\changepass',
        	],
    	],

3. Finally this module can be called by <a href="index.php?r=changepass">

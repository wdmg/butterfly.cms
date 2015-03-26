<?php
namespace console\controllers;
use Yii;
use yii\console\Controller;
use common\components\rbac\UserRoleRule;
class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;
        $auth->removeAll(); // Сlear old data
        
        // Create a right to access the admin panel
        $dashboard = $auth->createPermission('dashboard');
        $dashboard->description = 'Админ панель';
        $auth->add($dashboard);
        
        // Turn handler permissions
        $rule = new UserRoleRule();
        $auth->add($rule);
        
        // Add user roles
        $user = $auth->createRole('user');
        $user->description = 'Пользователь';
        $user->ruleName = $rule->name;
        $auth->add($user);
        
        // Create a moderator
        $moderator = $auth->createRole('moderator');
        $moderator->description = 'Модератор';
        $moderator->ruleName = $rule->name;
        
        // Adding a moderator
        $auth->add($moderator);
        $auth->addChild($moderator, $user);
        $auth->addChild($moderator, $dashboard);
        
        // Create a administrator 
        $administrator = $auth->createRole('administrator');
        $administrator->description = 'Администратор';
        $administrator->ruleName = $rule->name;
        
        // Adding administrator
        $auth->add($administrator);
        $auth->addChild($administrator, $moderator);
    }
}

/* If we need to change some of the rights,
just edit this controller and call again
command in the console run `php yii rbac/init`
*/
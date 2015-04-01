<?php
namespace common\components\rbac;
use Yii;
use yii\rbac\Rule;
use yii\helpers\ArrayHelper;
use common\models\Users;

class UserRoleRule extends Rule
{
    public $name = 'userRole';
    public function execute($user, $item, $params)
    {
        //ѕолучаем массив пользовател€ из базы
        $user = ArrayHelper::getValue($params, 'user', Users::findOne($user));
        if ($user) {
            // 'user','moderator','administrator'
            $role = $user->role; //«начение из пол€ role базы данных
            if ($item->name === 'administrator') {
                return $role == Users::ROLE_ADMINISTRATOR;
            } elseif ($item->name === 'moderator') {
                //moder €вл€етс€ потомком admin, который получает его права
                return $role == Users::ROLE_ADMINISTRATOR || $role == Users::ROLE_MODERATOR;
            } 
            elseif ($item->name === 'user') {
                return $role == Users::ROLE_ADMINISTRATOR || $role == Users::ROLE_MODERATOR || $role == Users::ROLE_USER;
            }
        }
        return false;
    }
}
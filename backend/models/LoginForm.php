<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;
    public $language;

    private $_user = false;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // Username are both required
            [['username'], 'required',
                'message'=>Yii::t('app', "Field '{attribute}' cannot be blank", ['attribute' => Yii::t('app', 'Username')]),
            ],
            
            // Password are both required
            [['password'], 'required',
                'message'=>Yii::t('app', "Field '{attribute}' cannot be blank", ['attribute' => Yii::t('app', 'Password')]),
            ],
            
            // RememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            
            // Select language
            ['language', 'string'],
            
            // Password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, Yii::t('app','Incorrect username or password'));
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    public function getUser()
    {
        if ($this->_user === false) {
            //Находим пользователя в БД по логину или эл.почте
            $this->_user = User::find()->andWhere(
                ['or', ['username' => $this->username],
                ['email' => $this->username]]
            )->one();
            //Проверяем права доступа, если нет, то делаем вид, что пользователь не найден.
            if (!Yii::$app->user->can('dashboard', ['user' => $this->_user])) {
                $this->_user = null;
            }
        }
        return $this->_user;
    }
}

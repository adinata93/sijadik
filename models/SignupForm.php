<?php
namespace app\models;

use yii\base\Model;
use app\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $nip;
    public $nama;
    public $jabatan;
    public $role;
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['nip', 'required'],
            ['nip', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This nip has already been taken.'],
            ['nip', 'string', 'max' => 255],
            
            ['nama', 'required'],
            ['nama', 'string', 'max' => 255],
            
            ['jabatan', 'required'],
            ['nama', 'string'],
            
            ['role', 'required'],
            ['nama', 'string'],

            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->nip = $this->nip;
        $user->nama = $this->nama;
        $user->jabatan = $this->jabatan;
        $user->role = $this->role;
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}

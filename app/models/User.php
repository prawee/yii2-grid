<?php

namespace app\models;

use auth\models\User as CUser;
//use common\models\User as CUser;

class User extends CUser {
    public function rules() {
        return [
            ['user_type_id', 'safe'],
            ['status', 'safe'],
            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],
            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'exist', 'message' => 'There is no user with such email.', 'on' => 'requestPasswordResetToken'],
            ['email', 'unique', 'message' => 'This email address has already been taken.', 'on' => 'signup'],
            ['password', 'required', 'on' => 'signup'],
            ['password', 'string', 'min' => 6],
            [['fullname','nation','address','organization'],'string'],
            [['telephone','parent_id'],'integer'],
            ['expired_date','date'],
        ];
    }
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'Password',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'last_login' => 'Last Visit Time',
            'created' => 'Create Time',
            'modified' => 'Update Time',
            'fullname'=>'Name',
        ];
    }

}

<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property string $created
 * @property string $modified
 * @property string $last_login
 * @property integer $user_type_id
 * @property string $fullname
 * @property integer $telephone
 * @property string $nation
 * @property string $address
 * @property string $organization
 * @property string $expired_date
 * @property integer $parent_id
 *
 * @property Account[] $accounts
 * @property MissionLocal[] $missionLocals
 * @property StripAccessLocal[] $stripAccessLocals
 * @property UserType $userType
 * @property Xml[] $xmls
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'auth_key', 'password_hash', 'email', 'fullname', 'nation', 'organization'], 'required'],
            [['role', 'status', 'user_type_id', 'telephone', 'parent_id'], 'integer'],
            [['created', 'modified', 'last_login', 'expired_date'], 'safe'],
            [['address'], 'string'],
            [['username', 'password_hash', 'password_reset_token', 'email', 'organization'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['fullname'], 'string', 'max' => 128],
            [['nation'], 'string', 'max' => 60],
            [['username'], 'unique'],
            [['email'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'role' => 'Role',
            'status' => 'Status',
            'created' => 'Created',
            'modified' => 'Modified',
            'last_login' => 'Last Login',
            'user_type_id' => 'User Type ID',
            'fullname' => 'Fullname',
            'telephone' => 'Telephone',
            'nation' => 'Nation',
            'address' => 'Address',
            'organization' => 'Organization',
            'expired_date' => 'Expired Date',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccounts()
    {
        return $this->hasMany(Account::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMissionLocals()
    {
        return $this->hasMany(MissionLocal::className(), ['midified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStripAccessLocals()
    {
        return $this->hasMany(StripAccessLocal::className(), ['modified_by_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserType()
    {
        return $this->hasOne(UserType::className(), ['id' => 'user_type_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getXmls()
    {
        return $this->hasMany(Xml::className(), ['client_id' => 'id']);
    }
}

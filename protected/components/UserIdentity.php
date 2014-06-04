<?php

class UserIdentity extends CUserIdentity
{
    private $_id;

    public function getId()	{
        return $this->_id;
    }

    public function authenticate() {
	
        $user = User::model()->find('login = :username OR email = :username AND status = :status', array(
            ':username' => $this->username,
			':status' => User::STATUS_CONFIRMED
        ));

		if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else {
            if (!User::verify($this->password, $user->password)) {
                $this->errorCode = self::ERROR_PASSWORD_INVALID;
            } else {
                $this->_id = $user->id;
                $this->errorCode = self::ERROR_NONE;
            }
        }

        return !$this->errorCode;
    }
}
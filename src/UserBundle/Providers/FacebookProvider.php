<?php

namespace UserBundle\Providers;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use UserBundle\Document\User;

class FacebookProvider
{
    public function setUserData(User $user, UserResponseInterface $response)
    {
        $username = $response->getUsername();
        $responseArray = $response->getResponse();

        $user->setFirstName($responseArray['first_name']);
        $user->setSecondName($responseArray['last_name']);
        $user->setEmail('id'.$user->getFacebookId().'@example.com');
        $user->setUsername($username);
        $user->setPassword($username);
        $user->setEnabled(true);
        $user->setAvatar('http://graph.facebook.com/'.$username.'/picture?width=200&height=200');

        return $user;
    }
}
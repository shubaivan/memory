<?php

namespace UserBundle\Providers;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use UserBundle\Document\User;

class VkontakteProvider
{
    public function setUserData(User $user, UserResponseInterface $response)
    {
        $responseArray = $response->getResponse();

        $user->setFirstName($responseArray['response'][0]['first_name']);
        $user->setSecondName($responseArray['response'][0]['last_name']);
//        $user->setEmail('id'.$user->getVkontakteId().'@example.com');
    }
}
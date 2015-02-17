<?php

namespace UserBundle\Providers;

use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use Sluggable\Fixture\Handler\User;

class FacebookProvider
{
    public function setUserData(User $user, UserResponseInterface $response)
    {
    }
}
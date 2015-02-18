<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MenuController extends Controller
{
    public function showUserMenuAction(Request $request)
    {
        if($this->getUser()){
            $this->get('session')->set('user_menu', 'true');
        }

        return $this->redirect($this->generateUrl('app_get_all_videos'));
    }

    public function hideUserMenuAction(Request $request)
    {
        if($this->getUser()){
            $this->get('session')->remove('user_menu');
        }

        return $this->redirect($this->generateUrl('app_get_all_videos'));
    }
}

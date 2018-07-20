<?php

namespace Pichet\CoreBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{
    public function homeAction()
    {
        $mailService =  $this->get('pichet_core.mail.service');
        $mailService->sendMailTest();
        return $this->render('PichetCoreBundle:Admin:home.html.twig');
    }

}

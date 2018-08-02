<?php

namespace Pichet\CoreBundle\Service;

use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Form\FormFactoryInterface;

class MailService
{
    private $templating;
    private $rootDir;
    private $mailer;
    private $em;
    private $form;
    private $container;

    public function __construct(ContainerInterface $container, $rootDir, \Swift_Mailer $mailer, \Doctrine\ORM\EntityManager $em, FormFactoryInterface $form)
    {
        $this->templating = $container->get('templating');
        $this->rootDir = $rootDir;
        $this->mailer = $mailer;
        $this->em = $em;
        $this->form = $form;
        $this->container = $container;
    }

    public function sendMailTest()
    {
        $message = (new \Swift_Message())
            ->setSubject("PICHET - Grande enquête interne sur la mobilité")
            ->setFrom('booking@pichet.fr', 'PICHET')
            ->setTo('sibot.guierou@publish-it.fr');
        $tracker = '<img src="http://localhost/Pichet/web/app_dev.php/track.gif?id=1234" alt="" width="1" height="1" border="0">';

        $body = "<table style='font-family:arial; font-size:14px; width: 600px'>";
        $body .= "<tr><td>" . $this->templating->render('PichetCoreBundle:Email:mail.html.twig') . "</td></tr>";
        $body .= "</table>";
        $body .= $tracker;

        $message->setBody($body, 'text/html', 'utf-8');

        if ($this->mailer->send($message)) {
            return true;
        }

        return false;
    }
}
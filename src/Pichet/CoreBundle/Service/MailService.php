<?php

namespace Pichet\CoreBundle\Service;

use Swift_Attachment;
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

    public function sendMailTest($mailer)
    {
        $message = (new \Swift_Message())
            ->setSubject("PICHET - Grande enquête interne sur la mobilité")
            ->setFrom('booking@pichet.fr', 'PICHET')
            ->setTo($mailer);

        $attachment = Swift_Attachment::fromPath('http://localhost/Pichet/web/app_dev.php/test/track.gif')->setDisposition('inline');
        $attachment->getHeaders()->addTextHeader('Content-ID', '<ABC123>');
        $attachment->getHeaders()->addTextHeader('X-Attachment-Id', 'ABC123');
        $cid = $message->embed($attachment);
        $tracker = '<img src="cid:ABC123" alt="" width="1" height="1" border="0"/>';

//        $tracker = '<img src="http://localhost/Pichet/web/app_dev.php/track.gif?id=1234" alt="" width="1" height="1" border="0">';

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
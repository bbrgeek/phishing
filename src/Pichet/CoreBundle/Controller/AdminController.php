<?php

namespace Pichet\CoreBundle\Controller;

use Pichet\CoreBundle\Entity\Open;
use Symfony\Component\HttpFoundation\Request;
use LMammino\Http\TransparentPixelResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AdminController extends Controller
{
    public function homeAction()
    {
        $mailService =  $this->get('pichet_core.mail.service');
//        $mailService->sendMailTest();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Open");
        $nbMailQuery = $openRepository->getAllMailOpen();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Participe");
        $nbParticipe = $openRepository->getAllClickOnParticipe();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Entreprise");
        $nbInfoEntreprise = $openRepository->getAllInfoEntreprise();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Personnelle");
        $nbInfoPersonnelle = $openRepository->getAllInfoPersonnelle();

        return $this->render('PichetCoreBundle:Admin:home.html.twig',  array(
            'nbMailQuery' => $nbMailQuery,
            'nbParticipe' => $nbParticipe,
            'nbInfoEntreprise' => $nbInfoEntreprise,
            'nbInfoPersonnelle' => $nbInfoPersonnelle
        ));
    }

    public function trackingAction(Request $request)
    {
        $id = $request->query->get('id');
        if (null !== $id) {
            $dispatcher = $this->get('event_dispatcher');
            $dispatcher->addListener(KernelEvents::TERMINATE,
                function(KernelEvent $event) use ($id){
                    $open = new Open();

                    if ($open instanceof Open) {
                        $em = $this->getDoctrine()->getManager();
                        $em->persist($open);
                        $em->flush();
                    }
                }
            );
        }
        return new TransparentPixelResponse();
    }
}

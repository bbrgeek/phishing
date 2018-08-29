<?php

namespace Pichet\CoreBundle\Controller;

use Pichet\CoreBundle\Entity\Open;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use LMammino\Http\TransparentPixelResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class AdminController extends Controller
{
    public function homeAction()
    {

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Open");
        $nbMailQuery = $openRepository->getAllMailOpen();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Participe");
        $nbParticipe = $openRepository->getAllClickOnParticipe();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Entreprise");
        $nbInfoEntreprise = $openRepository->getAllInfoEntreprise();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Personnelle");
        $nbInfoPersonnelle = $openRepository->getAllInfoPersonnelle();

        $total = $nbMailQuery + $nbParticipe + $nbInfoEntreprise + $nbInfoPersonnelle;

        return $this->render('PichetCoreBundle:Admin:home.html.twig',  array(
            'nbMailQuery' => $nbMailQuery,
            'nbParticipe' => $nbParticipe,
            'nbInfoEntreprise' => $nbInfoEntreprise,
            'nbInfoPersonnelle' => $nbInfoPersonnelle,
            'total' => $total
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


    public function ouvertAction()
    {

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Open");
        $nbMailQuery = $openRepository->getAllMailOpen();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Participe");
        $nbParticipe = $openRepository->getAllClickOnParticipe();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Entreprise");
        $nbInfoEntreprise = $openRepository->getAllInfoEntreprise();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Personnelle");
        $nbInfoPersonnelle = $openRepository->getAllInfoPersonnelle();
        $total = $nbMailQuery + $nbParticipe + $nbInfoEntreprise + $nbInfoPersonnelle;
        return $this->render('PichetCoreBundle:Admin:mailOuvert.html.twig',  array(
            'nbMailQuery' => $nbMailQuery,
            'nbParticipe' => $nbParticipe,
            'nbInfoEntreprise' => $nbInfoEntreprise,
            'nbInfoPersonnelle' => $nbInfoPersonnelle,
            'total' => $total
        ));
    }

    public function participerAction()
    {

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Open");
        $nbMailQuery = $openRepository->getAllMailOpen();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Participe");
        $nbParticipe = $openRepository->getAllClickOnParticipe();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Entreprise");
        $nbInfoEntreprise = $openRepository->getAllInfoEntreprise();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Personnelle");
        $nbInfoPersonnelle = $openRepository->getAllInfoPersonnelle();
        $total = $nbMailQuery + $nbParticipe + $nbInfoEntreprise + $nbInfoPersonnelle;

        return $this->render('PichetCoreBundle:Admin:clickParticiper.html.twig',  array(
            'nbMailQuery' => $nbMailQuery,
            'nbParticipe' => $nbParticipe,
            'nbInfoEntreprise' => $nbInfoEntreprise,
            'nbInfoPersonnelle' => $nbInfoPersonnelle,
            'total' => $total
        ));
    }

    public function entrepriseAction()
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
        $total = $nbMailQuery + $nbParticipe + $nbInfoEntreprise + $nbInfoPersonnelle;
        return $this->render('PichetCoreBundle:Admin:informationEntreprise.html.twig',  array(
            'nbMailQuery' => $nbMailQuery,
            'nbParticipe' => $nbParticipe,
            'nbInfoEntreprise' => $nbInfoEntreprise,
            'nbInfoPersonnelle' => $nbInfoPersonnelle,
            'total' => $total
        ));
    }

    public function personnelleAction()
    {

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Open");
        $nbMailQuery = $openRepository->getAllMailOpen();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Participe");
        $nbParticipe = $openRepository->getAllClickOnParticipe();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Entreprise");
        $nbInfoEntreprise = $openRepository->getAllInfoEntreprise();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Personnelle");
        $nbInfoPersonnelle = $openRepository->getAllInfoPersonnelle();
        $total = $nbMailQuery + $nbParticipe + $nbInfoEntreprise + $nbInfoPersonnelle;
        return $this->render('PichetCoreBundle:Admin:informationPersonnelle.html.twig',  array(
            'nbMailQuery' => $nbMailQuery,
            'nbParticipe' => $nbParticipe,
            'nbInfoEntreprise' => $nbInfoEntreprise,
            'nbInfoPersonnelle' => $nbInfoPersonnelle,
            'total' => $total
        ));
    }

    public function servicesAction()
    {

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Open");
        $nbMailQuery = $openRepository->getAllMailOpen();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Participe");
        $nbParticipe = $openRepository->getAllClickOnParticipe();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Entreprise");
        $nbInfoEntreprise = $openRepository->getAllInfoEntreprise();
        $Entreprise = $openRepository->getAllEntreprise();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Personnelle");
        $nbInfoPersonnelle = $openRepository->getAllInfoPersonnelle();

        $total = $nbMailQuery + $nbParticipe + $nbInfoEntreprise + $nbInfoPersonnelle;

        return $this->render('PichetCoreBundle:Admin:byServices.html.twig',  array(
            'nbMailQuery' => $nbMailQuery,
            'nbParticipe' => $nbParticipe,
            'nbInfoEntreprise' => $nbInfoEntreprise,
            'Entreprise' => $Entreprise,
            'nbInfoPersonnelle' => $nbInfoPersonnelle,
            'total' => $total
        ));
    }

    public function sendMailAction(Request $request)
    {
        $mailService =  $this->get('pichet_core.mail.service');
        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Open");
        $nbMailQuery = $openRepository->getAllMailOpen();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Participe");
        $nbParticipe = $openRepository->getAllClickOnParticipe();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Entreprise");
        $nbInfoEntreprise = $openRepository->getAllInfoEntreprise();
        $Entreprise = $openRepository->getAllEntreprise();

        $openRepository = $this->getDoctrine()->getRepository("PichetCoreBundle:Personnelle");
        $nbInfoPersonnelle = $openRepository->getAllInfoPersonnelle();

        $total = $nbMailQuery + $nbParticipe + $nbInfoEntreprise + $nbInfoPersonnelle;

        $defaultData = array();
        $form = $this->createFormBuilder($defaultData)
            ->add(
                'mail',
                EmailType::class,
                array(
                    'required' => true
                )
            )
            ->add('save',
                SubmitType::class,
                array(
                    'label' => 'envoyer',
                    'attr' => array('class' => 'col-md-12 btn-lg btn btn-danger')
                )
            )
            ->getForm();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $data = $form->getData();
            $mailService->sendMailTest($data['mail']);

            return $this->redirectToRoute('pichet_core_homepage');
        }


        return $this->render('PichetCoreBundle:Admin:mail.html.twig',   array(
            'nbMailQuery' => $nbMailQuery,
            'nbParticipe' => $nbParticipe,
            'nbInfoEntreprise' => $nbInfoEntreprise,
            'Entreprise' => $Entreprise,
            'nbInfoPersonnelle' => $nbInfoPersonnelle,
            'total' => $total,
            'form' => $form->createView(),
        ));
    }

}

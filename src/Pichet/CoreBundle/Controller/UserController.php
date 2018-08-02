<?php

namespace Pichet\CoreBundle\Controller;

use Pichet\CoreBundle\Entity\Entreprise;
use Pichet\CoreBundle\Entity\Personnelle;
use Pichet\CoreBundle\Form\EntrepriseType;
use Pichet\CoreBundle\Form\PersonnelleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    public function formAction(Request $request, $step)
    {

        if ($step == 1) {
            $persons = new Personnelle();
            $form   = $this->get('form.factory')->create(PersonnelleType::class, $persons);

            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($persons);
                $em->flush();

                return $this->redirectToRoute('pichet_core_step', array('step' => 2));
            }
            return $this->render(
                'PichetCoreBundle:User:step1.html.twig',
                array(
                    'step' => $step,
                    'form' => $form->createView()
                ));
        }
        elseif ($step == 2) {
            $persons = new Entreprise();
            $form   = $this->get('form.factory')->create(EntrepriseType::class, $persons);
            if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($persons);
                $em->flush();

                return $this->redirectToRoute('pichet_core_step', array('step' => 3));
            }
            return $this->render(
                'PichetCoreBundle:User:step2.html.twig',
                array(
                    'step' => $step,
                    'form' => $form->createView()
            ));

        }elseif ($step == 3) {

            return $this->render(
                'PichetCoreBundle:User:step3.html.twig',
                array(

                )
            );
        }
    }
}

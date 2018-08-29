<?php

namespace Pichet\CoreBundle\Controller;


use Pichet\CoreBundle\Entity\Open;
use Pichet\CoreBundle\Entity\Participe;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Pichet\CoreBundle\Tracking\TransparentPixelResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\KernelEvents;

class AjaxController extends Controller
{
    public function addOpenMailAction(Request $request)
    {
        $id = $request->query->get('id');
        if (null !== $id) {

            $open = new Open();
            $open->setToken($id);
//        if ($open instanceof Open) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($open);
            $em->flush();
        }

        return new TransparentPixelResponse();
//        return new JsonResponse('ok');
    }

    public function addClickParticiperAction()
    {
        $participe = new Participe();

        if ($participe instanceof Participe) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($participe);
            $em->flush();
        }
        return $this->redirectToRoute('pichet_core_step', array('step' => 1));
//        return new JsonResponse('ok');
    }

}

<?php

namespace AppBundle\Controller;



use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Form\LoginForm;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="security_login")
     */
    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $form = $this->createForm(LoginForm::class, [
            '_username' => $lastUsername,
        ]);

        return $this->render(
            'default/login.html.twig',
            array(
                // last username entered by the user
                'form' => $form->createView(),
                'error'         => $error,
            )
        );
    }
}

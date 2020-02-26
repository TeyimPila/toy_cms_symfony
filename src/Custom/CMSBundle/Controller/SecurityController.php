<?php

namespace Custom\CMSBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class SecurityController extends Controller
{
    // src/AppBundle/Controller/SecurityController.php

    public function loginAction()
    {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('CustomCMSBundle:Security:login.html.twig', array(
            'last_username' => $lastUsername,
            'error'         => $error,
        ));
    }
}
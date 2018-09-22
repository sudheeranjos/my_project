<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
		$client = new \Github\Client();
		$repos = $client->api('repo')->find('symfony');
		
		/*echo "<pre>";
		print_r($repos);
		echo "</pre>";
		exit;*/
		
        return $this->render('default/index.html.twig',[
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR, 'repos' => $repos
        ]);
    }
	
}

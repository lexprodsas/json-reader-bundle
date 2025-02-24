<?php

namespace Lexprodsas\JsonReaderBundle\Controller;

use Contao\CoreBundle\Controller\FrontendModule\AbstractFrontendModuleController;
use Contao\Template;
use Contao\ModuleModel;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class JsonReaderController extends AbstractFrontendModuleController
{
    private $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    protected function getResponse(Template $template, ModuleModel $model, Request $request): ?Response
    {
        // Récupérer l'URL JSON à partir des paramètres du module
        $url = $model->json_url;

        // Effectuer la requête HTTP pour récupérer les données JSON
        $response = $this->httpClient->request('GET', $url);
        $data = $response->toArray();

        // Passer les données au template
        $template->data = $data;

        // Retourner la réponse générée par le template
        return $template->getResponse();
    }
}


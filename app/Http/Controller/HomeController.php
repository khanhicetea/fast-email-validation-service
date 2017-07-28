<?php
namespace App\Http\Controller;

use Flashy\Http\Controller;
use FastEmailValidator\EmailAddress;

class HomeController extends Controller
{
    protected function indexAction($params)
    {
        return $this->json([
            'name' => 'Fast Email Validation Service',
            'author' => 'khanhicetea',
            'link' => 'https://github.com/khanhicetea/fast-email-validation-service'
        ]);
    }

    protected function validateAction()
    {
        $params = $this->request->getQueryParams();
        $q = $params['q'] ?? null;

        if ($q) {
            $email = new EmailAddress($q);
            $result = $this->fev->validate($email);
            
            return $this->json($result);
        }

        return $this->response->withStatus(422, 'Missing q parameter');
    }
}

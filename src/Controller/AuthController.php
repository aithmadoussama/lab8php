<?php
namespace App\Controller;

use App\Core\Request;
use App\Core\View;
use App\Core\Response;
use App\Security\Auth;
use App\Security\Csrf;

class AuthController extends BaseController
{
    private $auth; 
    private $csrf;

    public function __construct(View $view, Response $response, Auth $auth, Csrf $csrf)
    {
        parent::__construct($view, $response);
        $this->auth = $auth;
        $this->csrf = $csrf;
    }

    public function loginForm(Request $request, array $params = []): void
    {
        $this->render('auth/login.php', ['errors' => [], 'old' => []]);
    }

    public function login(Request $request, array $params = []): void
    {
        $username = trim((string)$request->getBodyParam('username'));
        $password = (string)$request->getBodyParam('password');
        if ($username === '' || $password === '') {
            $this->render('auth/login.php', ['errors' => ['global' => 'Identifiants requis.'], 'old' => ['username' => $username]]);
            return;
        }
        if ($this->auth->login($username, $password)) {
            $this->redirect('/etudiants');
            return;
        }
        $this->render('auth/login.php', ['errors' => ['global' => 'Login ou mot de passe invalide.'], 'old' => ['username' => $username]]);
    }

    public function logout(Request $request, array $params = []): void
    { 
        $this->auth->logout(); 
        $this->redirect('/login'); 
    }
}
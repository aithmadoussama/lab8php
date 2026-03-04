<?php
namespace App\Core;

class Router
{
    private $routes = [
        "GET" => [],
        "POST" => [],
    ];

    public function get(string $pattern, callable $handler): void
    {
        $this->add("GET", $pattern, $handler);
    }

    public function post(string $pattern, callable $handler): void
    { 
        $this->add('POST', $pattern, $handler); 
    }

    private function add(string $methode, string $pattern, callable $handler): void
    {
        $regex = $this->compile($pattern);
        $this->routes[$methode][]=[
            "pattern" => $pattern,
            "regex" => $regex,
            "handler" => $handler
        ];
    }

    private function compile(string $pattern): string
    {
        $regex = preg_replace("#\{([a-zA-Z_][a-zA-Z0-9_]*)\}#", "(?P<$1>[^/]+)", $pattern);
        return '#^' . rtrim($regex, '/') . '$#';
    }

    public function dispatch(Request $request): void
    {
        $methode = $request->getMethod();
        $path = rtrim($request->getPath(), "/");
        if ($path === "") {
            $path = "/";
        }

        foreach ($this->routes[$methode] as $route) {
            if (preg_match($route["regex"], $path, $matches)) {
                $parms = [];
                foreach ($matches as $key => $value) {
                    if (!is_int($key)) {
                        $parms[$key] = $value;
                    }
                }
                call_user_func($route["handler"], $request, $parms);
                return;
            }
        }
        http_response_code(404);
        header('Content-Type: text/plain; charset=utf-8');
        echo "404 :/ NOT FOUND: ". $path;
    }
}
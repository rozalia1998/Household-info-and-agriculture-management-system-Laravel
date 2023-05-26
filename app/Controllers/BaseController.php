<?php
namespace App\Controller;

class BaseController{

    public function validate($str) {
        return trim(htmlspecialchars($str));
      }

    protected function render(string $view, array $data = []) {
        extract($data);
        require __DIR__ . '/../../views/layout.php';
    }
}
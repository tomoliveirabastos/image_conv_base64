<?php
    namespace App\Controller;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;

    class InitController extends AbstractController{
        /**
         * @Route("/route_init/", name="route_init", methods="GET")
         */
        public function route_init() {
            return $this->render("base.html.twig");
        }
        /**
         * @Route("/route_post", name="route_post", methods="POST")
         */
        public function route_post(){
            $files = $_FILES['imagem'];
            $extensao = explode(".", $files['name'])[count(explode(".", $files['name'])) - 1];
            $content = base64_encode(file_get_contents($files['tmp_name']));
            return new JsonResponse("data:imagem/$extensao;base64,$content");
        }
    }
?>
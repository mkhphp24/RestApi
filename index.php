<?php

use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use Symfony\Component\Routing\RouteCollectionBuilder;
use App\Controller\GetController;
use App\Controller\PostController;
use App\Controller\PutController;
use App\Controller\DeletController;

include __DIR__ . "/bootstrap/atuoload.php";

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    public function registerBundles()
    {
        return [
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle()
        ];
    }

    protected function configureContainer(ContainerBuilder $c, LoaderInterface $loader)
    {
        // PHP equivalent of config/packages/framework.yaml
        $c->loadFromExtension('framework', [
            'secret' => 'S0ME_SECRET'
        ]);
    }

    protected function configureRoutes(RouteCollectionBuilder $routes)
    {
        // kernel is a service that points to this class
        // optional 3rd argument is the route name
        $routes->add('/getproduct/{id}', 'kernel::getProduct')->setMethods('Get');
        $routes->add('/getproduct/', 'kernel::postProduct')->setMethods('POST');
        $routes->add('/getproduct/', 'kernel::putProduct')->setMethods('PUT');
        $routes->add('/getproduct/{id}', 'kernel::deleteProduct')->setMethods('DELETE');

    }

    /**
     * @param $id
     * @return JsonResponse
     * @Method({"GET", "HEAD"})
     */
    public function getproduct($id){

        $getData = new GetController($id);
      return new JsonResponse([
          'result' => $getData->returnData(),
      ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Method({"POST", "HEAD"})
     */
    public function postProduct(Request $request){
        $data = json_decode($request->getContent(), true);

        $postData=new PostController($data);
        return new JsonResponse([
            'result' => $postData->insert(),
        ]);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     * @Method({"PUT", "HEAD"})
     */
    public function putProduct(Request $request){

        $data = json_decode($request->getContent(), true);
        $putData=new PutController($data);
        return new JsonResponse([
            'result' => $putData->update(),
        ]);
    }

    /**
     * @param $id
     * @return JsonResponse
     * @Method({"DELETE", "HEAD"})
     */
    public function deleteProduct($id){
        $getData = new DeletController($id);
        return new JsonResponse([
            'result' => $getData->deleteData(),
        ]);
    }
}

$kernel = new Kernel('dev', true);
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);

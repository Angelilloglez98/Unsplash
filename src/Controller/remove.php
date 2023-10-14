<?php
    namespace App\Controller;

    use App\Entity\Pictures;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;
    
    class remove extends AbstractController
    {
        #[Route(path: '/remove', name: 'remove', methods: ['POST'])]
        public function remove(EntityManagerInterface $em, Request $request)
        {
            $repository=$em->getRepository(Pictures::class);

            $id = $request->request->get('id');

            $obj=null;
            
            if ($id) {
                $obj = $repository->findOneBy(['id' => $id]);
                if ($obj) {
                    
                    $archivo = null; 

                    if ($obj->getUrl() != null) {
                        $archivo = $obj->getUrl();
                    }else{
                        $archivo = $obj->getUrlWeb();
                    }
        
                    $em->remove($obj);
                    $em->flush();

                    $directorioArchivos = $this->getParameter('brochures_directory');
                    $rutaArchivo = $directorioArchivos . '/' . $archivo;
        
                    if (file_exists($rutaArchivo)) {
                        unlink($rutaArchivo);
                    }
        
                    return new JsonResponse(["msg" => "Se ha eliminado correctamente"]);
                }
            }
        
            return new JsonResponse(["msg" => "No se encontró el registro o no se pudo eliminar"]);
        }
        
    }
?>
<?php
    namespace App\Controller;

    use App\Entity\Pictures;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\JsonResponse;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\Routing\Annotation\Route;


    class upload extends AbstractController
    {
        #[Route(path: '/upload', name: 'upload', methods: ['POST'])]
        public function Upload(Request $request, EntityManagerInterface $em)
        {
            $file = $request->files->get('file');
            $label = $request->request->get('label');
            $urlWeb =$request->request->get('url');

            if ($file) {

                $newFilename = uniqid().'.'.$file->guessExtension();
                $file->move($this->getParameter('brochures_directory'),$newFilename);

                $picture=new Pictures();
                $picture->setUrl($newFilename);
                if ($label) {
                    $picture->setLabel($label);
                }else{
                    $picture->setLabel('');
                }
                $em->persist($picture);
                $em->flush();
                return new JsonResponse(["msg"=>"se ha movido correctamente"]);

            }else if ($urlWeb) {

                $picture=new Pictures();
                $picture->setUrlWeb($urlWeb);
                if ($label) {
                    $picture->setLabel($label);
                }else{
                    $picture->setLabel('');
                }
                $em->persist($picture);
                $em->flush();
                return new JsonResponse(["msg"=>"se ha añadido la url correctamente"]);

            }else{
                return new JsonResponse(["msg"=>"No se ha ejecutado correctamente"]);
            }

        }
    }

?>
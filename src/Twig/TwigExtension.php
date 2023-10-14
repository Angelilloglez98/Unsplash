<?php
    namespace App\Twig;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Extension\AbstractExtension;
    use Twig\TwigFunction;
    

    class TwigExtension extends AbstractExtension
    {
        public $entityManager;

        public function __construct(EntityManagerInterface $em) {
            $this->entityManager = $em;
        }

        public function getFunctions(): array
        {
            return [
                new TwigFunction('Search', [$this, 'Search']),
                new TwigFunction('searchEntities', [$this, 'searchEntities']),
            ];
        }

        public function Search($class)
        {   
            $repo= $this->entityManager->getRepository($class);
            $res = $repo->findAll();
            return $res;
        }

        public function searchEntities(string $entityName, string $where)
        {

            $repository = $this->entityManager->getRepository($entityName);
            $query = $repository->createQueryBuilder('e')
               ->andWhere($where)
               ->getQuery()
               ->getResult();

            return $query;
        }
        
    }
?>
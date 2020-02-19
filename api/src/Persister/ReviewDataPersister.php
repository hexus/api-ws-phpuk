<?php

namespace App\Persister;

use ApiPlatform\Core\DataPersister\ContextAwareDataPersisterInterface;
use App\Entity\Review;
use Doctrine\ORM\EntityManagerInterface;

/**
 * A data persister that applies a random score to reviews that have a score of zero or less.
 */
class ReviewDataPersister implements ContextAwareDataPersisterInterface
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function supports($data, array $context = []): bool
    {
        return $data instanceof \App\Entity\Review;
    }

    public function persist($review, array $context = [])
    {
        /**
         * @var Review $review
         */
        if ($review->getRate() <= 0)
            $review->setRate(rand(1, 5));

        $this->entityManager->persist($review);
        $this->entityManager->flush();

    }

    public function remove($data, array $context = [])
    {
        $this->entityManager->remove($data);
        $this->entityManager->flush();
    }

}

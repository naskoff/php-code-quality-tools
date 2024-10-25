<?php

namespace App\Tests\Repositories;

use App\Entity\Post;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PostRepositoryTest extends KernelTestCase
{
    public function testRepositoryWorks(): void
    {
        /** @var PostRepository $repository */
        $repository = self::getContainer()->get(PostRepository::class);

        /** @var EntityManagerInterface $entityManager */
        $entityManager = self::getContainer()->get(EntityManagerInterface::class);

        $post = (new Post())
            ->setTitle('Title')
            ->setDescription('Description');

        $entityManager->persist($post);
        $entityManager->flush();

        $postDb = $repository->findOneBy(['title' => 'Title']);

        $this->assertInstanceOf(Post::class, $postDb);
        $this->assertIsInt($postDb->getId());
        $this->assertSame('Title', $postDb->getTitle());
        $this->assertSame('Description', $postDb->getDescription());
    }
}

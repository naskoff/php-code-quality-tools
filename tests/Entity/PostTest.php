<?php

namespace App\Tests\Entity;

use App\Entity\Post;
use PHPUnit\Framework\TestCase;

class PostTest extends TestCase
{
    public function testGettersAndSetters(): void
    {
        $post = new Post();
        $post->setTitle('title');
        $post->setDescription('description');

        $this->assertSame('title', $post->getTitle());
        $this->assertSame('description', $post->getDescription());
    }
}

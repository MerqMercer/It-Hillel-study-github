<?php

namespace Hillel\Tests;

use ReflectionClass;
use Hillel\Entities\MergeTransformer;
use Hillel\Entities\TransformerFactory;
use Hillel\Entities\Transformer2;
use PHPUnit\Framework\TestCase;

class MergeTransformerTest extends TestCase
{
    protected MergeTransformer $mergeTransformer;

    public function setUp(): void
    {
        $this->mergeTransformer = new MergeTransformer();
    }

    public function testAddTRansformer()
    {
       $factory = new TransformerFactory();
       $factory->addType(new Transformer2());
       $this->mergeTransformer->addTransformer(new Transformer2());
       $this->mergeTransformer->addTransformer($factory->createTransformer2(2));      
       
       $this->assertEquals(
            50,
            (new ReflectionClass(MergeTransformer::class))
                ->getProperty('speed')
                ->getValue($this->mergeTransformer)
        );
       
       $this->assertEquals(
            330,
            (new ReflectionClass(MergeTransformer::class))
                ->getProperty('weight')
                ->getValue($this->mergeTransformer)
        );
       
       $this->assertEquals(
            390,
            (new ReflectionClass(MergeTransformer::class))
                ->getProperty('height')
                ->getValue($this->mergeTransformer)
        );       
    }
}

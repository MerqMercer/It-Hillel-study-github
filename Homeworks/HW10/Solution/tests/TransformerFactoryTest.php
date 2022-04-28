<?php

namespace Hillel\Tests;

use ReflectionClass;
use Hillel\Entities\TransformerFactory;
use Hillel\Entities\Transformer1;
use PHPUnit\Framework\TestCase;

class TransformerFactoryTest extends TestCase
{
    protected TransformerFactory $transformerFactory;

    public function setUp(): void
    {
        $this->transformerFactory = new TransformerFactory();
    }

    public function testCreateFactory()
    {
        $this->assertEqualsCanonicalizing('create', $this->transformerFactory->createPrefix);
        $this->assertEqualsCanonicalizing([], $this->transformerFactory->manufacturing);
    }

    public function testAddType()
    {
       $transformer1 = new Transformer1();
       $this->transformerFactory->addType(new Transformer1());
       
       $this->assertEquals(
            [get_class($transformer1) => $transformer1],
            (new ReflectionClass(TransformerFactory::class))
                ->getProperty('manufacturing')
                ->getValue($this->transformerFactory)
        );       
    }
    
    public function testCreateTransformer()
    {
        $this->transformerFactory->addType(new Transformer1());
        
        $this->assertEqualsCanonicalizing(
            [new Transformer1(), new Transformer1()],
            $this->transformerFactory->createTransformer1(2)
        );
    }
}

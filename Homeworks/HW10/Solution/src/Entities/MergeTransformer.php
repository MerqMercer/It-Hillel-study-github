<?php

namespace Hillel\Entities;

class MergeTransformer extends Transformer
{
    public function addTransformer($transformerSet)
    {
        if (is_array($transformerSet)) {
            foreach ($transformerSet as $transformer) {
                $this->updateTransformerSpecs($transformer);
            }
        } else {
            $this->updateTransformerSpecs($transformerSet);
        }
    }

    public function updateTransformerSpecs($anotherTransformer)
    {
        $this->setWeight($this->weight + $anotherTransformer->getWeight());
        $this->setHeight($this->height + $anotherTransformer->getHeight());

        if ($this->speed !== 0) {
            $this->setSpeed(min($this->speed, $anotherTransformer->getSpeed()));
        } else {
            $this->setSpeed($anotherTransformer->getSpeed());
        }
    }
}

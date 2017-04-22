<?php

namespace Inspiration\Questions\Infrastructure\StackOverflow;

use Inspiration\Questions\DomainModel\QuestionRequest as QuestionRequestInterface;
use Inspiration\Questions\DomainModel\QuestionRequestFactory as BaseFactory;

/**
 * Class QuestionRequestFactory
 */
class QuestionRequestFactory implements BaseFactory
{
    /**
     * @return QuestionRequest
     */
    public function build(array $queryParams): QuestionRequestInterface
    {
        return new QuestionRequest($queryParams);
    }
}

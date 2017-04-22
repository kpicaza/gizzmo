<?php

namespace Inspiration\Questions\Infrastructure\StackOverflow;

use Inspiration\Questions\DomainModel\QuestionRequest as QuestionRequestInterface;

/**
 * Class QuestionRequest
 */
class QuestionRequest implements QuestionRequestInterface
{
    /**
     * @var array
     */
    private $queryParams;

    /**
     * QuestionRequest constructor.
     *
     * @param array $queryParams
     */
    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    /**
     * @return array
     */
    public function getQuery(): array
    {
        return $this->queryParams;
    }
}

<?php

namespace Inspiration\Questions\DomainModel;

/**
 * Interface QuoteRequest
 */
interface QuestionRequest
{
    /**
     * QuoteRequest constructor.
     *
     * @param array $queryParams
     */
    public function __construct(array $queryParams);

    /**
     * @return array
     */
    public function getQuery(): array;
}

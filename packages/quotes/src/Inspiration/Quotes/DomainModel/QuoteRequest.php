<?php

namespace Inspiration\Quotes\DomainModel;

/**
 * Interface QuoteRequest
 */
interface QuoteRequest
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
    public function getQuery();
}

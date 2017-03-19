<?php

namespace Inspiration\Quotes\Infrastructure\Forismatic;

use Inspiration\Quotes\DomainModel\QuoteRequestFactory as BaseFactory;

class QuoteRequestFactory implements BaseFactory
{
    private $queryParams;

    public function __construct(array $queryParams = [])
    {
        $this->queryParams = $queryParams;
    }

    public function getRequest()
    {
        return new QuoteRequest($this->queryParams);
    }
}

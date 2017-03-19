<?php

namespace Inspiration\Quotes\Infrastructure\Forismatic;

use Inspiration\Quotes\DomainModel\QuoteRequest as BaseRequest;

/**
 * Class QuoteRequest
 */
class QuoteRequest implements BaseRequest
{
    const FORMAT = 'json';
    const LANG = 'en';
    const METHOD = 'getQuote';
    const KEY = '999999';
    const QUERY_PARAMS = [
        'method' => self::METHOD,
        'format' => self::FORMAT,
        'lang' => self::LANG,
        'key' => self::KEY
    ];

    /**
     * @var array
     */
    private $queryParams;

    /**
     * QuoteRequest constructor.
     *
     * @param array $queryParams
     */
    public function __construct(array $queryParams)
    {
        $this->queryParams = array_merge(
            self::QUERY_PARAMS,
            ['key' => random_int(1, 999999)]
        );
    }

    /**
     * @return array
     */
    public function getQuery()
    {
        return $this->queryParams;
    }
}

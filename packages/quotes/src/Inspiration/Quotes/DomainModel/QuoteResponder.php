<?php

namespace Inspiration\Quotes\DomainModel;

use Psr\Http\Message\ResponseInterface;

interface QuoteResponder
{
    /**
     * @param ResponseInterface $response
     *
     * @return mixed
     */
    public function getResponse(ResponseInterface $response);
}

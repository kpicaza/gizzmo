<?php

namespace Inspiration\Quotes\DomainModel;


/**
 * Interface QuoteClient
 */
interface QuoteClient
{
    /**
     * @return mixed
     */
    public function get(QuoteRequest $request);
}

<?php

namespace Inspiration\Questions\DomainModel;

/**
 * Interface QuoteClient
 */
interface QuestionClient
{
    /**
     * @return mixed
     */
    public function get(QuestionRequest $request);
}

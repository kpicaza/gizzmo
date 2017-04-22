<?php

namespace Inspiration\Questions\DomainModel;

interface QuestionRequestFactory
{
    public function build(array $queryParams): QuestionRequest;
}

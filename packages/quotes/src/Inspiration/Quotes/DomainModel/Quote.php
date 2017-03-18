<?php

namespace Inspiration\Quotes\DomainModel;

class Quote
{
    private $text;

    private $author;

    private $link;

    public function __construct(string $text, string $author, string $link = '')
    {
        $this->text = $text;
        $this->author = $author;
        $this->link = $link;
    }

    public function text()
    {
        return $this->text;
    }

    public function author()
    {
        return $this->author;
    }

    public function link()
    {
        return $this->link;
    }
}

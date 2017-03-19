<?php

namespace Inspiration\Quotes\DomainModel;

/**
 * Class Quote
 */
class Quote
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $author;

    /**
     * @var string
     */
    private $link;

    /**
     * Quote constructor.
     *
     * @param string $text
     * @param string $author
     * @param string $link
     */
    public function __construct(string $text, string $author, string $link = '')
    {
        $this->text = $text;
        $this->author = $author;
        $this->link = $link;
    }

    /**
     * @return string
     */
    public function text()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function author()
    {
        return $this->author;
    }

    /**
     * @return string
     */
    public function link()
    {
        return $this->link;
    }
}

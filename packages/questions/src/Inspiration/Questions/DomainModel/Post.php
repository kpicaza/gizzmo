<?php

namespace Inspiration\Questions\DomainModel;

/**
 * Class Post
 */
class Post
{
    /**
     * @var string
     */
    private $title;

    /**
     * Post constructor.
     *
     * @param string $title
     */
    public function __construct(string $title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }
}

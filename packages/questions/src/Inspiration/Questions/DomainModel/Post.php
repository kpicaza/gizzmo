<?php

namespace Inspiration\Questions\DomainModel;

use Kpicaza\Objects\ExternalLink;
use Kpicaza\Objects\Title;

/**
 * Class Post
 */
class Post
{
    /**
     * @var Title
     */
    private $title;

    /**
     * @var ExternalLink
     */
    private $link;

    /**
     * @var int
     */
    private $points;

    /**
     * Post constructor.
     *
     * @param Title $title
     * @param ExternalLink $link
     * @param int $points
     */
    public function __construct(Title $title, ExternalLink $link, int $points)
    {
        $this->title = $title;
        $this->link = $link;
        $this->points = $points;
    }

    /**
     * @return string
     */
    public function title(): string
    {
        return $this->title->text();
    }

    /**
     * @return string
     */
    public function link(): string
    {
        return $this->link->url();
    }

    /**
     * @return int
     */
    public function points(): int
    {
        return $this->points;
    }
}

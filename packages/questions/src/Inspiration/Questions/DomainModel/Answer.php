<?php

namespace Inspiration\Questions\DomainModel;

/**
 * Class Answer
 */
class Answer
{
    /**
     * @var array
     */
    private $posts;

    /**
     * Answer constructor.
     * @param array $posts
     */
    public function __construct(array $posts = [])
    {
        $this->posts = $posts;
    }

    /**
     * @return string
     */
    public function text(): string
    {
        $messages = 0 <= count($this->posts)
            ? Messages::HAD_ANSWERS
            : Messages::HAVENT_ANSWERS;

        return $messages[0];
    }

    /**
     * @return array
     */
    public function posts(): array
    {
        return $this->posts;
    }
}

<?php

namespace Kpicaza\Objects;

/**
 * Class Title
 */
class Title
{
    const MIN_LENGTH = 20;
    const MAX_LENGTH = 160;

    /**
     * @var string
     */
    private $text;

    /**
     * Title constructor.
     *
     * @param $text
     */
    public function __construct($text)
    {
        $this->assertToShort($text);
        $this->assertToLong($text);
        $this->text = $text;
    }

    /**
     * @param string $text
     *
     * @return Title
     */
    public static function fromString($text)
    {
        return new self($text);
    }

    /**
     * @param $text
     */
    private function assertToShort($text)
    {
        if (self::MIN_LENGTH > strlen($text)) {
            throw new InvalidArgumentException(
                'Title is to short, it must have at least 40 characters.'
            );
        }
    }

    /**
     * @param $text
     */
    private function assertToLong($text)
    {
        if (self::MAX_LENGTH < strlen($text)) {
            throw new InvalidArgumentException(
                'Title is to long, it must have up to 160 characters.'
            );
        }
    }

    /**
     * @return string
     */
    public function text()
    {
        return $this->text;
    }
}

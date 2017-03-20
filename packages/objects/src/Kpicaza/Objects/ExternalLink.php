<?php

namespace Kpicaza\Objects;

/**
 * Class ExternalLink
 */
class ExternalLink
{
    /**
     * @var string
     */
    private $url;

    /**
     * ExternalLink constructor.
     *
     * @param string $url
     */
    public function __construct($url)
    {
        $this->assertValidUrl($url);
        $this->url = $url;
    }

    /**
     * @param $url
     *
     * @return ExternalLink
     */
    public static function fromString($url)
    {
        return new self($url);
    }

    /**
     * @param string $url
     */
    private function assertValidUrl($url)
    {
        if (false === filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_SCHEME_REQUIRED)) {
            throw new InvalidArgumentException(
                'External link must be valid url.'
            );
        }
    }

    /**
     * @return string
     */
    public function url()
    {
        return $this->url;
    }
}

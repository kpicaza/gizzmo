<?php

namespace Kpicaza\Objects;

/**
 * Class Domain
 */
class Domain
{
    const PATTERN = '@^[a-zA-Z0-9][a-zA-Z0-9-_]{0,61}[a-zA-Z0-9]{0,1}\.([a-zA-Z]{1,6}|[a-zA-Z0-9-]{1,30}\.[a-zA-Z]{2,3})$@i';

    /**
     * @var string
     */
    private $fqdn;

    /**
     * Domain constructor.
     *
     * @param $fqdn
     */
    public function __construct($fqdn)
    {
        $this->assertValidDomainName($fqdn);
        $this->fqdn = $fqdn;
    }

    /**
     * @param $fqdn
     *
     * @return Domain
     */
    public static function fromString($fqdn)
    {
        return new self($fqdn);
    }

    /**
     * @param $fqdn
     */
    private function assertValidDomainName($fqdn)
    {
        if (0 === preg_match(self::PATTERN, $fqdn)) {
            throw new InvalidArgumentException(
                'Domain name must not have a protocol'
            );
        }
    }

    /**
     * @return string
     */
    public function fqdn()
    {
        return $this->fqdn;
    }
}

<?php
namespace Cable\Ordm\Query;

use Cable\Ordm\Blueprint\Statement;
use Cable\Ordm\Metadata;

class Blueprint
{

    /**
     * @var Metadata
     */
    private $metadata;

    /**
     * @var Statement[]
     */
    private $statements;


    /**
     * Blueprint constructor.
     * @param Metadata $metadata
     */
    public function __construct( Metadata $metadata)
    {
        $this->metadata = $metadata;
    }


    /**
     * @return Metadata
     */
    public function getMetadata(): Metadata
    {
        return $this->metadata;
    }

    /**
     * @param Metadata $metadata
     * @return Blueprint
     */
    public function setMetadata(Metadata $metadata): Blueprint
    {
        $this->metadata = $metadata;
        return $this;
    }

    /**
     * @return Statement[]
     */
    public function getStatements(): array
    {
        return $this->statements;
    }

    /**
     * @param Statement[] $statements
     * @return Blueprint
     */
    public function setStatements(array $statements): Blueprint
    {
        $this->statements = $statements;
        return $this;
    }
}

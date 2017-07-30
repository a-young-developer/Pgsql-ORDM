<?php
namespace Cable\Ordm\Blueprint;
use Cable\Ordm\Blueprint\Statement\Constraint;
use Cable\Ordm\Blueprint\Statement\CreateIndex;
use Cable\Ordm\Blueprint\Statement\DefaultStatement;
use Cable\Ordm\Blueprint\Statement\Foreign;
use Cable\Ordm\Blueprint\Statement\ForeignKey;
use Cable\Ordm\Blueprint\Statement\NotNull;
use Cable\Ordm\Blueprint\Statement\PrimaryKey;
use Cable\Ordm\Blueprint\Statement\Reference;
use Cable\Ordm\Blueprint\Statement\Index;
use Cable\Ordm\Types\Type;

/**
 * Class Column
 * @package Cable\Ordm\Blueprint
 */
final class Column
{

    /**
     * @var string
     */
    private $name;

    /**
     * @var array
     */
    private $parameters;

    /**
     * @var Type
     */
    private $type;

    /**
     * @var Statement[]
     */
    private $statements = [];

    /**
     * @var array
     */
    private $constraints = [];


    /**
     * @var Index[]
     */
    private $indexes = [];

    /**
     * Column constructor.
     * @param string  $name
     * @param Type $type
     */
    public function __construct(string $name, array $parameters, Type $type)
    {
        $this->setName($name)
            ->setType($type)
            ->setParameters($parameters);
    }

    /**
     * @return array
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

    /**
     * @param array $parameters
     * @return Column
     */
    public function setParameters(array $parameters): Column
    {
        $this->parameters = $parameters;
        return $this;
    }


    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Column
     */
    public function setName(string $name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param Type $type
     * @return Column
     */
    public function setType(Type $type)
    {
        $this->type = $type;
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
     * @return Column
     */
    public function setStatements(array $statements): Column
    {
        $this->statements = $statements;
        return $this;
    }

    /**
     * @return array
     */
    public function getConstraints(): array
    {
        return $this->constraints;
    }

    /**
     * @param array $constraints
     * @return Column
     */
    public function setConstraints(array $constraints): Column
    {
        $this->constraints = $constraints;
        return $this;
    }

    /**
     * @return Index[]
     */
    public function getIndexes(): array
    {
        return $this->indexes;
    }

    /**
     * @param Index[] $indexes
     * @return Column
     */
    public function setIndexes(array $indexes): Column
    {
        $this->indexes = $indexes;
        return $this;
    }

    /**
     * @param Statement $statement
     * @return $this
     */
    public function addStatement(Statement $statement){
        $this->statements[] = $statement;

        return $this;
    }

    /**
     * @return $this
     */
    public function notNull(){
        $this->addStatement(new NotNull());

        return $this;
    }

    /**
     * @return $this
     */
    public function primaryKey(){
        $this->addStatement(new PrimaryKey());

        return $this;
    }

    /**
     * @param $value
     * @return $this
     */
    public function default($value){
        $this->addStatement(new DefaultStatement($value));

        return $this;
    }

    /**
     * @param string $table
     * @return Index
     */
    public function index( string $table)
    {
        return $this->indexes[] = (new Index())->setTable($table)->setColumn($this);
    }

    /**
     * @param string $name
     * @param string $target
     * @param array $fromTo
     * @return Foreign
     */
    public function foreignKey(string $name, string $target, array $fromTo = ["id", "id"]){
        $statements = [
            new Constraint($name),
            new ForeignKey($fromTo[0]),
            new Reference($target, $fromTo[1])
        ];

        return $this->constraints[] = new Foreign($statements);
    }
}

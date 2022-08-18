<?php

class DB{
    protected $connection;
    protected $record;
    protected $queryBilder;

    /**
     * DB constructor.
     * @param $connection
     * @param $record
     * @param $queryBilder
     */
    public function __construct(DBFactoryInterface $factory)
    {
        $this->connection = $factory->getConnection();
        $this->record = $factory->getRecord();
        $this->queryBilder = $factory->getQueryBilder();
    }

}

interface ConnectionInterface{}
interface RecordInterface{}
interface QueryBilderInterface{}

interface DBFactoryInterface {
    public function getConnection(): ConnectionInterface;
    public function getRecord(): RecordInterface;
    public function getQueryBilder(): QueryBilderInterface;
}

class MysqlDBConnection implements ConnectionInterface{}
class MysqlDBRecord implements RecordInterface{}
class MysqlDBQueryBilder implements QueryBilderInterface{}

class PgDBConnection implements ConnectionInterface{}
class PglDBRecord implements RecordInterface{}
class PgDBQueryBilder implements QueryBilderInterface{}

class MysqlDBFactory implements DBFactoryInterface{

    public function getConnection(): ConnectionInterface
    {
        return new MysqlDBConnection();
    }

    public function getRecord(): RecordInterface
    {
        return new MysqlDBRecord();
    }

    public function getQueryBilder(): QueryBilderInterface
    {
        return new MysqlDBQueryBilder();
    }
}

class PgDBFactory implements DBFactoryInterface{

    public function getConnection(): ConnectionInterface
    {
        return new PgDBConnection();
    }

    public function getRecord(): RecordInterface
    {
        return new PglDBRecord();
    }

    public function getQueryBilder(): QueryBilderInterface
    {
        return new PgDBQueryBilder();
    }
}

$db = new DB( new MysqlDBFactory());



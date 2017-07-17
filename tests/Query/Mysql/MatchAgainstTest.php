<?php

namespace DoctrineExtensions\Tests\Query\Mysql;

class MatchAgainstTest extends \DoctrineExtensions\Tests\Query\MysqlTestCase
{
    public function testMatchAgainst()
    {
        $dql = "SELECT s FROM DoctrineExtensions\Tests\Entities\StringContent s WHERE MATCH (s.content) AGAINST ('query') > 0";
        $q = $this->entityManager->createQuery($dql);
        $sql = "SELECT s0_.id AS id_0, s0_.content AS content_1 FROM StringContent s0_ WHERE MATCH (s0_.content) AGAINST ('query') > 0";

        $this->assertEquals($sql, $q->getSql());
    }

    public function testMatchAgainstBoolean()
    {
        $dql = "SELECT s FROM DoctrineExtensions\Tests\Entities\StringContent s WHERE MATCH (s.content) AGAINST ('query' BOOLEAN) > 0";
        $q = $this->entityManager->createQuery($dql);
        $sql = "SELECT s0_.id AS id_0, s0_.content AS content_1 FROM StringContent s0_ WHERE MATCH (s0_.content) AGAINST ('query' IN BOOLEAN MODE) > 0";

        $this->assertEquals($sql, $q->getSql());
    }

    public function testMatchAgainstExpand()
    {
        $dql = "SELECT s FROM DoctrineExtensions\Tests\Entities\StringContent s WHERE MATCH (s.content) AGAINST ('query' EXPAND) > 0";
        $q = $this->entityManager->createQuery($dql);
        $sql = "SELECT s0_.id AS id_0, s0_.content AS content_1 FROM StringContent s0_ WHERE MATCH (s0_.content) AGAINST ('query' WITH QUERY EXPANSION) > 0";

        $this->assertEquals($sql, $q->getSql());
    }

    public function testMatchAgainstWithColonParameter()
    {
        $dql = "SELECT s FROM DoctrineExtensions\Tests\Entities\StringContent s WHERE MATCH (s.content) AGAINST (:query) > 0";
        $q = $this->entityManager->createQuery($dql);
        $parameters = array(
            'query' => 'query',
        );
        $q->setParameters($parameters);
        $sql = "SELECT s0_.id AS id_0, s0_.content AS content_1 FROM StringContent s0_ WHERE MATCH (s0_.content) AGAINST (?) > 0";

        $actualParameters = $q->getParameters();
        $parsedParameters = array(
            $actualParameters[0]->getName() => $actualParameters[0]->getValue()
        );

        $this->assertEquals($sql, $q->getSql());
        $this->assertEquals($parameters, $parsedParameters);
    }

    public function testMatchAgainstBooleanWithColonParameter()
    {
        $dql = "SELECT s FROM DoctrineExtensions\Tests\Entities\StringContent s WHERE MATCH (s.content) AGAINST (:query BOOLEAN) > 0";
        $q = $this->entityManager->createQuery($dql);
        $parameters = array(
            'query' => 'query',
        );
        $q->setParameters($parameters);
        $sql = "SELECT s0_.id AS id_0, s0_.content AS content_1 FROM StringContent s0_ WHERE MATCH (s0_.content) AGAINST (? IN BOOLEAN MODE) > 0";

        $actualParameters = $q->getParameters();
        $parsedParameters = array(
            $actualParameters[0]->getName() => $actualParameters[0]->getValue()
        );

        $this->assertEquals($sql, $q->getSql());
        $this->assertEquals($parameters, $parsedParameters);
    }

    public function testMatchAgainstExpandWithColonParameter()
    {
        $dql = "SELECT s FROM DoctrineExtensions\Tests\Entities\StringContent s WHERE MATCH (s.content) AGAINST (:query EXPAND) > 0";
        $q = $this->entityManager->createQuery($dql);
        $parameters = array(
            'query' => 'query',
        );
        $q->setParameters($parameters);
        $sql = "SELECT s0_.id AS id_0, s0_.content AS content_1 FROM StringContent s0_ WHERE MATCH (s0_.content) AGAINST (? WITH QUERY EXPANSION) > 0";

        $actualParameters = $q->getParameters();
        $parsedParameters = array(
            $actualParameters[0]->getName() => $actualParameters[0]->getValue()
        );

        $this->assertEquals($sql, $q->getSql());
        $this->assertEquals($parameters, $parsedParameters);
    }

    public function testMatchAgainstWithQuestionParameter()
    {
        $dql = "SELECT s FROM DoctrineExtensions\Tests\Entities\StringContent s WHERE MATCH (s.content) AGAINST (?1) > 0";
        $q = $this->entityManager->createQuery($dql);
        $parameters = array(
            1 => 'query'
        );
        $q->setParameters($parameters);
        $sql = "SELECT s0_.id AS id_0, s0_.content AS content_1 FROM StringContent s0_ WHERE MATCH (s0_.content) AGAINST (?) > 0";

        $actualParameters = $q->getParameters();
        $parsedParameters = array(
            $actualParameters[0]->getName() => $actualParameters[0]->getValue()
        );

        $this->assertEquals($sql, $q->getSql());
        $this->assertEquals($parameters, $parsedParameters);
    }

    public function testMatchAgainstBooleanWithQuestionParameter()
    {
        $dql = "SELECT s FROM DoctrineExtensions\Tests\Entities\StringContent s WHERE MATCH (s.content) AGAINST (?1 BOOLEAN) > 0";
        $q = $this->entityManager->createQuery($dql);
        $parameters = array(
            1 => 'query'
        );
        $q->setParameters($parameters);
        $sql = "SELECT s0_.id AS id_0, s0_.content AS content_1 FROM StringContent s0_ WHERE MATCH (s0_.content) AGAINST (? IN BOOLEAN MODE) > 0";

        $actualParameters = $q->getParameters();
        $parsedParameters = array(
            $actualParameters[0]->getName() => $actualParameters[0]->getValue()
        );

        $this->assertEquals($sql, $q->getSql());
        $this->assertEquals($parameters, $parsedParameters);
    }

    public function testMatchAgainstExpandWithQuestionParameter()
    {
        $dql = "SELECT s FROM DoctrineExtensions\Tests\Entities\StringContent s WHERE MATCH (s.content) AGAINST (?1 EXPAND) > 0";
        $q = $this->entityManager->createQuery($dql);
        $parameters = array(
            1 => 'query'
        );
        $q->setParameters($parameters);
        $sql = "SELECT s0_.id AS id_0, s0_.content AS content_1 FROM StringContent s0_ WHERE MATCH (s0_.content) AGAINST (? WITH QUERY EXPANSION) > 0";

        $actualParameters = $q->getParameters();
        $parsedParameters = array(
            $actualParameters[0]->getName() => $actualParameters[0]->getValue()
        );

        $this->assertEquals($sql, $q->getSql());
        $this->assertEquals($parameters, $parsedParameters);
    }
}

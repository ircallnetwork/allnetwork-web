<?php

namespace Propel\Table\AllNetwork\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Table\AllNetwork\PostTag as ChildPostTag;
use Propel\Table\AllNetwork\PostTagQuery as ChildPostTagQuery;
use Propel\Table\AllNetwork\Map\PostTagTableMap;

/**
 * Base class that represents a query for the 'posttag' table.
 *
 * 
 *
 * @method     ChildPostTagQuery orderByPostId($order = Criteria::ASC) Order by the posttag_post column
 * @method     ChildPostTagQuery orderByTagId($order = Criteria::ASC) Order by the posttag_tag column
 *
 * @method     ChildPostTagQuery groupByPostId() Group by the posttag_post column
 * @method     ChildPostTagQuery groupByTagId() Group by the posttag_tag column
 *
 * @method     ChildPostTagQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPostTagQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPostTagQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPostTagQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPostTagQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPostTagQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPostTagQuery leftJoinPost($relationAlias = null) Adds a LEFT JOIN clause to the query using the Post relation
 * @method     ChildPostTagQuery rightJoinPost($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Post relation
 * @method     ChildPostTagQuery innerJoinPost($relationAlias = null) Adds a INNER JOIN clause to the query using the Post relation
 *
 * @method     ChildPostTagQuery joinWithPost($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Post relation
 *
 * @method     ChildPostTagQuery leftJoinWithPost() Adds a LEFT JOIN clause and with to the query using the Post relation
 * @method     ChildPostTagQuery rightJoinWithPost() Adds a RIGHT JOIN clause and with to the query using the Post relation
 * @method     ChildPostTagQuery innerJoinWithPost() Adds a INNER JOIN clause and with to the query using the Post relation
 *
 * @method     ChildPostTagQuery leftJoinTag($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tag relation
 * @method     ChildPostTagQuery rightJoinTag($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tag relation
 * @method     ChildPostTagQuery innerJoinTag($relationAlias = null) Adds a INNER JOIN clause to the query using the Tag relation
 *
 * @method     ChildPostTagQuery joinWithTag($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Tag relation
 *
 * @method     ChildPostTagQuery leftJoinWithTag() Adds a LEFT JOIN clause and with to the query using the Tag relation
 * @method     ChildPostTagQuery rightJoinWithTag() Adds a RIGHT JOIN clause and with to the query using the Tag relation
 * @method     ChildPostTagQuery innerJoinWithTag() Adds a INNER JOIN clause and with to the query using the Tag relation
 *
 * @method     \Propel\Table\AllNetwork\PostQuery|\Propel\Table\AllNetwork\TagQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPostTag findOne(ConnectionInterface $con = null) Return the first ChildPostTag matching the query
 * @method     ChildPostTag findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPostTag matching the query, or a new ChildPostTag object populated from the query conditions when no match is found
 *
 * @method     ChildPostTag findOneByPostId(int $posttag_post) Return the first ChildPostTag filtered by the posttag_post column
 * @method     ChildPostTag findOneByTagId(string $posttag_tag) Return the first ChildPostTag filtered by the posttag_tag column *

 * @method     ChildPostTag requirePk($key, ConnectionInterface $con = null) Return the ChildPostTag by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPostTag requireOne(ConnectionInterface $con = null) Return the first ChildPostTag matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPostTag requireOneByPostId(int $posttag_post) Return the first ChildPostTag filtered by the posttag_post column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPostTag requireOneByTagId(string $posttag_tag) Return the first ChildPostTag filtered by the posttag_tag column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPostTag[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPostTag objects based on current ModelCriteria
 * @method     ChildPostTag[]|ObjectCollection findByPostId(int $posttag_post) Return ChildPostTag objects filtered by the posttag_post column
 * @method     ChildPostTag[]|ObjectCollection findByTagId(string $posttag_tag) Return ChildPostTag objects filtered by the posttag_tag column
 * @method     ChildPostTag[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PostTagQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Table\AllNetwork\Base\PostTagQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Table\\AllNetwork\\PostTag', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPostTagQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPostTagQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPostTagQuery) {
            return $criteria;
        }
        $query = new ChildPostTagQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array[$posttag_post, $posttag_tag] $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPostTag|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PostTagTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PostTagTableMap::getInstanceFromPool(serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]))))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPostTag A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT posttag_post, posttag_tag FROM posttag WHERE posttag_post = :p0 AND posttag_tag = :p1';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);            
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPostTag $obj */
            $obj = new ChildPostTag();
            $obj->hydrate($row);
            PostTagTableMap::addInstanceToPool($obj, serialize([(null === $key[0] || is_scalar($key[0]) || is_callable([$key[0], '__toString']) ? (string) $key[0] : $key[0]), (null === $key[1] || is_scalar($key[1]) || is_callable([$key[1], '__toString']) ? (string) $key[1] : $key[1])]));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildPostTag|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildPostTagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PostTagTableMap::COL_POSTTAG_POST, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PostTagTableMap::COL_POSTTAG_TAG, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPostTagQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PostTagTableMap::COL_POSTTAG_POST, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PostTagTableMap::COL_POSTTAG_TAG, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the posttag_post column
     *
     * Example usage:
     * <code>
     * $query->filterByPostId(1234); // WHERE posttag_post = 1234
     * $query->filterByPostId(array(12, 34)); // WHERE posttag_post IN (12, 34)
     * $query->filterByPostId(array('min' => 12)); // WHERE posttag_post > 12
     * </code>
     *
     * @see       filterByPost()
     *
     * @param     mixed $postId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostTagQuery The current query, for fluid interface
     */
    public function filterByPostId($postId = null, $comparison = null)
    {
        if (is_array($postId)) {
            $useMinMax = false;
            if (isset($postId['min'])) {
                $this->addUsingAlias(PostTagTableMap::COL_POSTTAG_POST, $postId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($postId['max'])) {
                $this->addUsingAlias(PostTagTableMap::COL_POSTTAG_POST, $postId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTagTableMap::COL_POSTTAG_POST, $postId, $comparison);
    }

    /**
     * Filter the query on the posttag_tag column
     *
     * Example usage:
     * <code>
     * $query->filterByTagId('fooValue');   // WHERE posttag_tag = 'fooValue'
     * $query->filterByTagId('%fooValue%', Criteria::LIKE); // WHERE posttag_tag LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tagId The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostTagQuery The current query, for fluid interface
     */
    public function filterByTagId($tagId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tagId)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTagTableMap::COL_POSTTAG_TAG, $tagId, $comparison);
    }

    /**
     * Filter the query by a related \Propel\Table\AllNetwork\Post object
     *
     * @param \Propel\Table\AllNetwork\Post|ObjectCollection $post The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPostTagQuery The current query, for fluid interface
     */
    public function filterByPost($post, $comparison = null)
    {
        if ($post instanceof \Propel\Table\AllNetwork\Post) {
            return $this
                ->addUsingAlias(PostTagTableMap::COL_POSTTAG_POST, $post->getId(), $comparison);
        } elseif ($post instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PostTagTableMap::COL_POSTTAG_POST, $post->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPost() only accepts arguments of type \Propel\Table\AllNetwork\Post or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Post relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostTagQuery The current query, for fluid interface
     */
    public function joinPost($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Post');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Post');
        }

        return $this;
    }

    /**
     * Use the Post relation Post object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\Table\AllNetwork\PostQuery A secondary query class using the current class as primary query
     */
    public function usePostQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPost($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Post', '\Propel\Table\AllNetwork\PostQuery');
    }

    /**
     * Filter the query by a related \Propel\Table\AllNetwork\Tag object
     *
     * @param \Propel\Table\AllNetwork\Tag|ObjectCollection $tag The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildPostTagQuery The current query, for fluid interface
     */
    public function filterByTag($tag, $comparison = null)
    {
        if ($tag instanceof \Propel\Table\AllNetwork\Tag) {
            return $this
                ->addUsingAlias(PostTagTableMap::COL_POSTTAG_TAG, $tag->getName(), $comparison);
        } elseif ($tag instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PostTagTableMap::COL_POSTTAG_TAG, $tag->toKeyValue('PrimaryKey', 'Name'), $comparison);
        } else {
            throw new PropelException('filterByTag() only accepts arguments of type \Propel\Table\AllNetwork\Tag or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tag relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostTagQuery The current query, for fluid interface
     */
    public function joinTag($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tag');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tag');
        }

        return $this;
    }

    /**
     * Use the Tag relation Tag object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\Table\AllNetwork\TagQuery A secondary query class using the current class as primary query
     */
    public function useTagQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTag($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tag', '\Propel\Table\AllNetwork\TagQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPostTag $postTag Object to remove from the list of results
     *
     * @return $this|ChildPostTagQuery The current query, for fluid interface
     */
    public function prune($postTag = null)
    {
        if ($postTag) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PostTagTableMap::COL_POSTTAG_POST), $postTag->getPostId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PostTagTableMap::COL_POSTTAG_TAG), $postTag->getTagId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

    /**
     * Code to execute before every DELETE statement
     *
     * @param     ConnectionInterface $con The connection object used by the query
     */
    protected function basePreDelete(ConnectionInterface $con)
    {
        // aggregate_column_relation_aggregate_column behavior
        $this->findRelatedTagNbPostss($con);

        return $this->preDelete($con);
    }

    /**
     * Code to execute after every DELETE statement
     *
     * @param     int $affectedRows the number of deleted rows
     * @param     ConnectionInterface $con The connection object used by the query
     */
    protected function basePostDelete($affectedRows, ConnectionInterface $con)
    {
        // aggregate_column_relation_aggregate_column behavior
        $this->updateRelatedTagNbPostss($con);

        return $this->postDelete($affectedRows, $con);
    }

    /**
     * Code to execute before every UPDATE statement
     *
     * @param     array $values The associative array of columns and values for the update
     * @param     ConnectionInterface $con The connection object used by the query
     * @param     boolean $forceIndividualSaves If false (default), the resulting call is a Criteria::doUpdate(), otherwise it is a series of save() calls on all the found objects
     */
    protected function basePreUpdate(&$values, ConnectionInterface $con, $forceIndividualSaves = false)
    {
        // aggregate_column_relation_aggregate_column behavior
        $this->findRelatedTagNbPostss($con);

        return $this->preUpdate($values, $con, $forceIndividualSaves);
    }

    /**
     * Code to execute after every UPDATE statement
     *
     * @param     int $affectedRows the number of updated rows
     * @param     ConnectionInterface $con The connection object used by the query
     */
    protected function basePostUpdate($affectedRows, ConnectionInterface $con)
    {
        // aggregate_column_relation_aggregate_column behavior
        $this->updateRelatedTagNbPostss($con);

        return $this->postUpdate($affectedRows, $con);
    }

    /**
     * Deletes all rows from the posttag table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostTagTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PostTagTableMap::clearInstancePool();
            PostTagTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostTagTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PostTagTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            PostTagTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            PostTagTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    // aggregate_column_relation_aggregate_column behavior
    
    /**
     * Finds the related Tag objects and keep them for later
     *
     * @param ConnectionInterface $con A connection object
     */
    protected function findRelatedTagNbPostss($con)
    {
        $criteria = clone $this;
        if ($this->useAliasInSQL) {
            $alias = $this->getModelAlias();
            $criteria->removeAlias($alias);
        } else {
            $alias = '';
        }
        $this->tagNbPostss = \Propel\Table\AllNetwork\TagQuery::create()
            ->joinPostTag($alias)
            ->mergeWith($criteria)
            ->find($con);
    }
    
    protected function updateRelatedTagNbPostss($con)
    {
        foreach ($this->tagNbPostss as $tagNbPosts) {
            $tagNbPosts->updateNbPosts($con);
        }
        $this->tagNbPostss = array();
    }

} // PostTagQuery

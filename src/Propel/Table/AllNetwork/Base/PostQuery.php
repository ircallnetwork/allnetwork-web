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
use Propel\Table\AllNetwork\Post as ChildPost;
use Propel\Table\AllNetwork\PostQuery as ChildPostQuery;
use Propel\Table\AllNetwork\Map\PostTableMap;

/**
 * Base class that represents a query for the 'post' table.
 *
 * 
 *
 * @method     ChildPostQuery orderById($order = Criteria::ASC) Order by the post_id column
 * @method     ChildPostQuery orderByTitle($order = Criteria::ASC) Order by the post_title column
 * @method     ChildPostQuery orderBySlug($order = Criteria::ASC) Order by the post_slug column
 * @method     ChildPostQuery orderByContent($order = Criteria::ASC) Order by the post_content column
 * @method     ChildPostQuery orderByImage($order = Criteria::ASC) Order by the post_image column
 * @method     ChildPostQuery orderByCreatedBy($order = Criteria::ASC) Order by the post_createdby column
 * @method     ChildPostQuery orderByCreatedDate($order = Criteria::ASC) Order by the post_createddate column
 * @method     ChildPostQuery orderByPublishDate($order = Criteria::ASC) Order by the post_publishdate column
 * @method     ChildPostQuery orderByStatus($order = Criteria::ASC) Order by the post_status column
 *
 * @method     ChildPostQuery groupById() Group by the post_id column
 * @method     ChildPostQuery groupByTitle() Group by the post_title column
 * @method     ChildPostQuery groupBySlug() Group by the post_slug column
 * @method     ChildPostQuery groupByContent() Group by the post_content column
 * @method     ChildPostQuery groupByImage() Group by the post_image column
 * @method     ChildPostQuery groupByCreatedBy() Group by the post_createdby column
 * @method     ChildPostQuery groupByCreatedDate() Group by the post_createddate column
 * @method     ChildPostQuery groupByPublishDate() Group by the post_publishdate column
 * @method     ChildPostQuery groupByStatus() Group by the post_status column
 *
 * @method     ChildPostQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildPostQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildPostQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildPostQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildPostQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildPostQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildPostQuery leftJoinPostTag($relationAlias = null) Adds a LEFT JOIN clause to the query using the PostTag relation
 * @method     ChildPostQuery rightJoinPostTag($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PostTag relation
 * @method     ChildPostQuery innerJoinPostTag($relationAlias = null) Adds a INNER JOIN clause to the query using the PostTag relation
 *
 * @method     ChildPostQuery joinWithPostTag($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the PostTag relation
 *
 * @method     ChildPostQuery leftJoinWithPostTag() Adds a LEFT JOIN clause and with to the query using the PostTag relation
 * @method     ChildPostQuery rightJoinWithPostTag() Adds a RIGHT JOIN clause and with to the query using the PostTag relation
 * @method     ChildPostQuery innerJoinWithPostTag() Adds a INNER JOIN clause and with to the query using the PostTag relation
 *
 * @method     \Propel\Table\AllNetwork\PostTagQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildPost findOne(ConnectionInterface $con = null) Return the first ChildPost matching the query
 * @method     ChildPost findOneOrCreate(ConnectionInterface $con = null) Return the first ChildPost matching the query, or a new ChildPost object populated from the query conditions when no match is found
 *
 * @method     ChildPost findOneById(int $post_id) Return the first ChildPost filtered by the post_id column
 * @method     ChildPost findOneByTitle(string $post_title) Return the first ChildPost filtered by the post_title column
 * @method     ChildPost findOneBySlug(string $post_slug) Return the first ChildPost filtered by the post_slug column
 * @method     ChildPost findOneByContent(string $post_content) Return the first ChildPost filtered by the post_content column
 * @method     ChildPost findOneByImage(string $post_image) Return the first ChildPost filtered by the post_image column
 * @method     ChildPost findOneByCreatedBy(int $post_createdby) Return the first ChildPost filtered by the post_createdby column
 * @method     ChildPost findOneByCreatedDate(string $post_createddate) Return the first ChildPost filtered by the post_createddate column
 * @method     ChildPost findOneByPublishDate(string $post_publishdate) Return the first ChildPost filtered by the post_publishdate column
 * @method     ChildPost findOneByStatus(string $post_status) Return the first ChildPost filtered by the post_status column *

 * @method     ChildPost requirePk($key, ConnectionInterface $con = null) Return the ChildPost by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOne(ConnectionInterface $con = null) Return the first ChildPost matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPost requireOneById(int $post_id) Return the first ChildPost filtered by the post_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByTitle(string $post_title) Return the first ChildPost filtered by the post_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneBySlug(string $post_slug) Return the first ChildPost filtered by the post_slug column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByContent(string $post_content) Return the first ChildPost filtered by the post_content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByImage(string $post_image) Return the first ChildPost filtered by the post_image column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByCreatedBy(int $post_createdby) Return the first ChildPost filtered by the post_createdby column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByCreatedDate(string $post_createddate) Return the first ChildPost filtered by the post_createddate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByPublishDate(string $post_publishdate) Return the first ChildPost filtered by the post_publishdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildPost requireOneByStatus(string $post_status) Return the first ChildPost filtered by the post_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildPost[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildPost objects based on current ModelCriteria
 * @method     ChildPost[]|ObjectCollection findById(int $post_id) Return ChildPost objects filtered by the post_id column
 * @method     ChildPost[]|ObjectCollection findByTitle(string $post_title) Return ChildPost objects filtered by the post_title column
 * @method     ChildPost[]|ObjectCollection findBySlug(string $post_slug) Return ChildPost objects filtered by the post_slug column
 * @method     ChildPost[]|ObjectCollection findByContent(string $post_content) Return ChildPost objects filtered by the post_content column
 * @method     ChildPost[]|ObjectCollection findByImage(string $post_image) Return ChildPost objects filtered by the post_image column
 * @method     ChildPost[]|ObjectCollection findByCreatedBy(int $post_createdby) Return ChildPost objects filtered by the post_createdby column
 * @method     ChildPost[]|ObjectCollection findByCreatedDate(string $post_createddate) Return ChildPost objects filtered by the post_createddate column
 * @method     ChildPost[]|ObjectCollection findByPublishDate(string $post_publishdate) Return ChildPost objects filtered by the post_publishdate column
 * @method     ChildPost[]|ObjectCollection findByStatus(string $post_status) Return ChildPost objects filtered by the post_status column
 * @method     ChildPost[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class PostQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Table\AllNetwork\Base\PostQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Table\\AllNetwork\\Post', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildPostQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildPostQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildPostQuery) {
            return $criteria;
        }
        $query = new ChildPostQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildPost|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PostTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = PostTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildPost A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT post_id, post_title, post_slug, post_content, post_image, post_createdby, post_createddate, post_publishdate, post_status FROM post WHERE post_id = :p0';
        try {
            $stmt = $con->prepare($sql);            
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildPost $obj */
            $obj = new ChildPost();
            $obj->hydrate($row);
            PostTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildPost|array|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
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
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PostTableMap::COL_POST_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PostTableMap::COL_POST_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the post_id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE post_id = 1234
     * $query->filterById(array(12, 34)); // WHERE post_id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE post_id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(PostTableMap::COL_POST_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(PostTableMap::COL_POST_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POST_ID, $id, $comparison);
    }

    /**
     * Filter the query on the post_title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE post_title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE post_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POST_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the post_slug column
     *
     * Example usage:
     * <code>
     * $query->filterBySlug('fooValue');   // WHERE post_slug = 'fooValue'
     * $query->filterBySlug('%fooValue%', Criteria::LIKE); // WHERE post_slug LIKE '%fooValue%'
     * </code>
     *
     * @param     string $slug The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterBySlug($slug = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($slug)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POST_SLUG, $slug, $comparison);
    }

    /**
     * Filter the query on the post_content column
     *
     * Example usage:
     * <code>
     * $query->filterByContent('fooValue');   // WHERE post_content = 'fooValue'
     * $query->filterByContent('%fooValue%', Criteria::LIKE); // WHERE post_content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $content The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByContent($content = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($content)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POST_CONTENT, $content, $comparison);
    }

    /**
     * Filter the query on the post_image column
     *
     * Example usage:
     * <code>
     * $query->filterByImage('fooValue');   // WHERE post_image = 'fooValue'
     * $query->filterByImage('%fooValue%', Criteria::LIKE); // WHERE post_image LIKE '%fooValue%'
     * </code>
     *
     * @param     string $image The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByImage($image = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($image)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POST_IMAGE, $image, $comparison);
    }

    /**
     * Filter the query on the post_createdby column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedBy(1234); // WHERE post_createdby = 1234
     * $query->filterByCreatedBy(array(12, 34)); // WHERE post_createdby IN (12, 34)
     * $query->filterByCreatedBy(array('min' => 12)); // WHERE post_createdby > 12
     * </code>
     *
     * @param     mixed $createdBy The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByCreatedBy($createdBy = null, $comparison = null)
    {
        if (is_array($createdBy)) {
            $useMinMax = false;
            if (isset($createdBy['min'])) {
                $this->addUsingAlias(PostTableMap::COL_POST_CREATEDBY, $createdBy['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdBy['max'])) {
                $this->addUsingAlias(PostTableMap::COL_POST_CREATEDBY, $createdBy['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POST_CREATEDBY, $createdBy, $comparison);
    }

    /**
     * Filter the query on the post_createddate column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedDate('2011-03-14'); // WHERE post_createddate = '2011-03-14'
     * $query->filterByCreatedDate('now'); // WHERE post_createddate = '2011-03-14'
     * $query->filterByCreatedDate(array('max' => 'yesterday')); // WHERE post_createddate > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByCreatedDate($createdDate = null, $comparison = null)
    {
        if (is_array($createdDate)) {
            $useMinMax = false;
            if (isset($createdDate['min'])) {
                $this->addUsingAlias(PostTableMap::COL_POST_CREATEDDATE, $createdDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdDate['max'])) {
                $this->addUsingAlias(PostTableMap::COL_POST_CREATEDDATE, $createdDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POST_CREATEDDATE, $createdDate, $comparison);
    }

    /**
     * Filter the query on the post_publishdate column
     *
     * Example usage:
     * <code>
     * $query->filterByPublishDate('2011-03-14'); // WHERE post_publishdate = '2011-03-14'
     * $query->filterByPublishDate('now'); // WHERE post_publishdate = '2011-03-14'
     * $query->filterByPublishDate(array('max' => 'yesterday')); // WHERE post_publishdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $publishDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByPublishDate($publishDate = null, $comparison = null)
    {
        if (is_array($publishDate)) {
            $useMinMax = false;
            if (isset($publishDate['min'])) {
                $this->addUsingAlias(PostTableMap::COL_POST_PUBLISHDATE, $publishDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($publishDate['max'])) {
                $this->addUsingAlias(PostTableMap::COL_POST_PUBLISHDATE, $publishDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POST_PUBLISHDATE, $publishDate, $comparison);
    }

    /**
     * Filter the query on the post_status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE post_status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE post_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PostTableMap::COL_POST_STATUS, $status, $comparison);
    }

    /**
     * Filter the query by a related \Propel\Table\AllNetwork\PostTag object
     *
     * @param \Propel\Table\AllNetwork\PostTag|ObjectCollection $postTag the related object to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return ChildPostQuery The current query, for fluid interface
     */
    public function filterByPostTag($postTag, $comparison = null)
    {
        if ($postTag instanceof \Propel\Table\AllNetwork\PostTag) {
            return $this
                ->addUsingAlias(PostTableMap::COL_POST_ID, $postTag->getPostId(), $comparison);
        } elseif ($postTag instanceof ObjectCollection) {
            return $this
                ->usePostTagQuery()
                ->filterByPrimaryKeys($postTag->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPostTag() only accepts arguments of type \Propel\Table\AllNetwork\PostTag or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PostTag relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function joinPostTag($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PostTag');

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
            $this->addJoinObject($join, 'PostTag');
        }

        return $this;
    }

    /**
     * Use the PostTag relation PostTag object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Propel\Table\AllNetwork\PostTagQuery A secondary query class using the current class as primary query
     */
    public function usePostTagQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPostTag($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PostTag', '\Propel\Table\AllNetwork\PostTagQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildPost $post Object to remove from the list of results
     *
     * @return $this|ChildPostQuery The current query, for fluid interface
     */
    public function prune($post = null)
    {
        if ($post) {
            $this->addUsingAlias(PostTableMap::COL_POST_ID, $post->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the post table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            PostTableMap::clearInstancePool();
            PostTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(PostTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(PostTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            PostTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            PostTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // PostQuery

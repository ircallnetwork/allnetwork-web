<?php

namespace Propel\Table\AllNetwork\Base;

use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Table\AllNetwork\User as ChildUser;
use Propel\Table\AllNetwork\UserQuery as ChildUserQuery;
use Propel\Table\AllNetwork\Map\UserTableMap;

/**
 * Base class that represents a query for the 'user' table.
 *
 * 
 *
 * @method     ChildUserQuery orderById($order = Criteria::ASC) Order by the user_id column
 * @method     ChildUserQuery orderByName($order = Criteria::ASC) Order by the user_name column
 * @method     ChildUserQuery orderByEmail($order = Criteria::ASC) Order by the user_email column
 * @method     ChildUserQuery orderByFirstName($order = Criteria::ASC) Order by the user_firstname column
 * @method     ChildUserQuery orderByLastName($order = Criteria::ASC) Order by the user_lastname column
 * @method     ChildUserQuery orderByPhoto($order = Criteria::ASC) Order by the user_photo column
 * @method     ChildUserQuery orderByPassword($order = Criteria::ASC) Order by the user_password column
 * @method     ChildUserQuery orderByKey($order = Criteria::ASC) Order by the user_key column
 * @method     ChildUserQuery orderByStatus($order = Criteria::ASC) Order by the user_status column
 * @method     ChildUserQuery orderBySuperUser($order = Criteria::ASC) Order by the user_su column
 * @method     ChildUserQuery orderByExpiredDate($order = Criteria::ASC) Order by the user_expired column
 * @method     ChildUserQuery orderByIPAddress($order = Criteria::ASC) Order by the user_ipaddress column
 * @method     ChildUserQuery orderByRegisterDate($order = Criteria::ASC) Order by the user_registerdate column
 * @method     ChildUserQuery orderByLevel($order = Criteria::ASC) Order by the user_level column
 *
 * @method     ChildUserQuery groupById() Group by the user_id column
 * @method     ChildUserQuery groupByName() Group by the user_name column
 * @method     ChildUserQuery groupByEmail() Group by the user_email column
 * @method     ChildUserQuery groupByFirstName() Group by the user_firstname column
 * @method     ChildUserQuery groupByLastName() Group by the user_lastname column
 * @method     ChildUserQuery groupByPhoto() Group by the user_photo column
 * @method     ChildUserQuery groupByPassword() Group by the user_password column
 * @method     ChildUserQuery groupByKey() Group by the user_key column
 * @method     ChildUserQuery groupByStatus() Group by the user_status column
 * @method     ChildUserQuery groupBySuperUser() Group by the user_su column
 * @method     ChildUserQuery groupByExpiredDate() Group by the user_expired column
 * @method     ChildUserQuery groupByIPAddress() Group by the user_ipaddress column
 * @method     ChildUserQuery groupByRegisterDate() Group by the user_registerdate column
 * @method     ChildUserQuery groupByLevel() Group by the user_level column
 *
 * @method     ChildUserQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildUserQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildUserQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildUserQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildUserQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildUserQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildUser findOne(ConnectionInterface $con = null) Return the first ChildUser matching the query
 * @method     ChildUser findOneOrCreate(ConnectionInterface $con = null) Return the first ChildUser matching the query, or a new ChildUser object populated from the query conditions when no match is found
 *
 * @method     ChildUser findOneById(int $user_id) Return the first ChildUser filtered by the user_id column
 * @method     ChildUser findOneByName(string $user_name) Return the first ChildUser filtered by the user_name column
 * @method     ChildUser findOneByEmail(string $user_email) Return the first ChildUser filtered by the user_email column
 * @method     ChildUser findOneByFirstName(string $user_firstname) Return the first ChildUser filtered by the user_firstname column
 * @method     ChildUser findOneByLastName(string $user_lastname) Return the first ChildUser filtered by the user_lastname column
 * @method     ChildUser findOneByPhoto(string $user_photo) Return the first ChildUser filtered by the user_photo column
 * @method     ChildUser findOneByPassword(string $user_password) Return the first ChildUser filtered by the user_password column
 * @method     ChildUser findOneByKey(string $user_key) Return the first ChildUser filtered by the user_key column
 * @method     ChildUser findOneByStatus(string $user_status) Return the first ChildUser filtered by the user_status column
 * @method     ChildUser findOneBySuperUser(string $user_su) Return the first ChildUser filtered by the user_su column
 * @method     ChildUser findOneByExpiredDate(string $user_expired) Return the first ChildUser filtered by the user_expired column
 * @method     ChildUser findOneByIPAddress(string $user_ipaddress) Return the first ChildUser filtered by the user_ipaddress column
 * @method     ChildUser findOneByRegisterDate(string $user_registerdate) Return the first ChildUser filtered by the user_registerdate column
 * @method     ChildUser findOneByLevel(string $user_level) Return the first ChildUser filtered by the user_level column *

 * @method     ChildUser requirePk($key, ConnectionInterface $con = null) Return the ChildUser by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOne(ConnectionInterface $con = null) Return the first ChildUser matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser requireOneById(int $user_id) Return the first ChildUser filtered by the user_id column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByName(string $user_name) Return the first ChildUser filtered by the user_name column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByEmail(string $user_email) Return the first ChildUser filtered by the user_email column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByFirstName(string $user_firstname) Return the first ChildUser filtered by the user_firstname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByLastName(string $user_lastname) Return the first ChildUser filtered by the user_lastname column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByPhoto(string $user_photo) Return the first ChildUser filtered by the user_photo column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByPassword(string $user_password) Return the first ChildUser filtered by the user_password column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByKey(string $user_key) Return the first ChildUser filtered by the user_key column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByStatus(string $user_status) Return the first ChildUser filtered by the user_status column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneBySuperUser(string $user_su) Return the first ChildUser filtered by the user_su column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByExpiredDate(string $user_expired) Return the first ChildUser filtered by the user_expired column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByIPAddress(string $user_ipaddress) Return the first ChildUser filtered by the user_ipaddress column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByRegisterDate(string $user_registerdate) Return the first ChildUser filtered by the user_registerdate column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildUser requireOneByLevel(string $user_level) Return the first ChildUser filtered by the user_level column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildUser[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildUser objects based on current ModelCriteria
 * @method     ChildUser[]|ObjectCollection findById(int $user_id) Return ChildUser objects filtered by the user_id column
 * @method     ChildUser[]|ObjectCollection findByName(string $user_name) Return ChildUser objects filtered by the user_name column
 * @method     ChildUser[]|ObjectCollection findByEmail(string $user_email) Return ChildUser objects filtered by the user_email column
 * @method     ChildUser[]|ObjectCollection findByFirstName(string $user_firstname) Return ChildUser objects filtered by the user_firstname column
 * @method     ChildUser[]|ObjectCollection findByLastName(string $user_lastname) Return ChildUser objects filtered by the user_lastname column
 * @method     ChildUser[]|ObjectCollection findByPhoto(string $user_photo) Return ChildUser objects filtered by the user_photo column
 * @method     ChildUser[]|ObjectCollection findByPassword(string $user_password) Return ChildUser objects filtered by the user_password column
 * @method     ChildUser[]|ObjectCollection findByKey(string $user_key) Return ChildUser objects filtered by the user_key column
 * @method     ChildUser[]|ObjectCollection findByStatus(string $user_status) Return ChildUser objects filtered by the user_status column
 * @method     ChildUser[]|ObjectCollection findBySuperUser(string $user_su) Return ChildUser objects filtered by the user_su column
 * @method     ChildUser[]|ObjectCollection findByExpiredDate(string $user_expired) Return ChildUser objects filtered by the user_expired column
 * @method     ChildUser[]|ObjectCollection findByIPAddress(string $user_ipaddress) Return ChildUser objects filtered by the user_ipaddress column
 * @method     ChildUser[]|ObjectCollection findByRegisterDate(string $user_registerdate) Return ChildUser objects filtered by the user_registerdate column
 * @method     ChildUser[]|ObjectCollection findByLevel(string $user_level) Return ChildUser objects filtered by the user_level column
 * @method     ChildUser[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class UserQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Propel\Table\AllNetwork\Base\UserQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Propel\\Table\\AllNetwork\\User', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildUserQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildUserQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildUserQuery) {
            return $criteria;
        }
        $query = new ChildUserQuery();
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
     * @return ChildUser|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(UserTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = UserTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildUser A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT user_id, user_name, user_email, user_firstname, user_lastname, user_photo, user_password, user_key, user_status, user_su, user_expired, user_ipaddress, user_registerdate, user_level FROM user WHERE user_id = :p0';
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
            /** @var ChildUser $obj */
            $obj = new ChildUser();
            $obj->hydrate($row);
            UserTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildUser|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserTableMap::COL_USER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserTableMap::COL_USER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE user_id = 1234
     * $query->filterById(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id)) {
            $useMinMax = false;
            if (isset($id['min'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_ID, $id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($id['max'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_ID, $id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_name column
     *
     * Example usage:
     * <code>
     * $query->filterByName('fooValue');   // WHERE user_name = 'fooValue'
     * $query->filterByName('%fooValue%', Criteria::LIKE); // WHERE user_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $name The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByName($name = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($name)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_NAME, $name, $comparison);
    }

    /**
     * Filter the query on the user_email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE user_email = 'fooValue'
     * $query->filterByEmail('%fooValue%', Criteria::LIKE); // WHERE user_email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the user_firstname column
     *
     * Example usage:
     * <code>
     * $query->filterByFirstName('fooValue');   // WHERE user_firstname = 'fooValue'
     * $query->filterByFirstName('%fooValue%', Criteria::LIKE); // WHERE user_firstname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $firstName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByFirstName($firstName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($firstName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_FIRSTNAME, $firstName, $comparison);
    }

    /**
     * Filter the query on the user_lastname column
     *
     * Example usage:
     * <code>
     * $query->filterByLastName('fooValue');   // WHERE user_lastname = 'fooValue'
     * $query->filterByLastName('%fooValue%', Criteria::LIKE); // WHERE user_lastname LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lastName The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByLastName($lastName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lastName)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_LASTNAME, $lastName, $comparison);
    }

    /**
     * Filter the query on the user_photo column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoto('fooValue');   // WHERE user_photo = 'fooValue'
     * $query->filterByPhoto('%fooValue%', Criteria::LIKE); // WHERE user_photo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $photo The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPhoto($photo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($photo)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_PHOTO, $photo, $comparison);
    }

    /**
     * Filter the query on the user_password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE user_password = 'fooValue'
     * $query->filterByPassword('%fooValue%', Criteria::LIKE); // WHERE user_password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the user_key column
     *
     * Example usage:
     * <code>
     * $query->filterByKey('fooValue');   // WHERE user_key = 'fooValue'
     * $query->filterByKey('%fooValue%', Criteria::LIKE); // WHERE user_key LIKE '%fooValue%'
     * </code>
     *
     * @param     string $key The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByKey($key = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($key)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_KEY, $key, $comparison);
    }

    /**
     * Filter the query on the user_status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE user_status = 'fooValue'
     * $query->filterByStatus('%fooValue%', Criteria::LIKE); // WHERE user_status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the user_su column
     *
     * Example usage:
     * <code>
     * $query->filterBySuperUser('fooValue');   // WHERE user_su = 'fooValue'
     * $query->filterBySuperUser('%fooValue%', Criteria::LIKE); // WHERE user_su LIKE '%fooValue%'
     * </code>
     *
     * @param     string $superUser The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterBySuperUser($superUser = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($superUser)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_SU, $superUser, $comparison);
    }

    /**
     * Filter the query on the user_expired column
     *
     * Example usage:
     * <code>
     * $query->filterByExpiredDate('2011-03-14'); // WHERE user_expired = '2011-03-14'
     * $query->filterByExpiredDate('now'); // WHERE user_expired = '2011-03-14'
     * $query->filterByExpiredDate(array('max' => 'yesterday')); // WHERE user_expired > '2011-03-13'
     * </code>
     *
     * @param     mixed $expiredDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_EXPIRED, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_EXPIRED, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_EXPIRED, $expiredDate, $comparison);
    }

    /**
     * Filter the query on the user_ipaddress column
     *
     * Example usage:
     * <code>
     * $query->filterByIPAddress('fooValue');   // WHERE user_ipaddress = 'fooValue'
     * $query->filterByIPAddress('%fooValue%', Criteria::LIKE); // WHERE user_ipaddress LIKE '%fooValue%'
     * </code>
     *
     * @param     string $iPAddress The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByIPAddress($iPAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($iPAddress)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_IPADDRESS, $iPAddress, $comparison);
    }

    /**
     * Filter the query on the user_registerdate column
     *
     * Example usage:
     * <code>
     * $query->filterByRegisterDate('2011-03-14'); // WHERE user_registerdate = '2011-03-14'
     * $query->filterByRegisterDate('now'); // WHERE user_registerdate = '2011-03-14'
     * $query->filterByRegisterDate(array('max' => 'yesterday')); // WHERE user_registerdate > '2011-03-13'
     * </code>
     *
     * @param     mixed $registerDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByRegisterDate($registerDate = null, $comparison = null)
    {
        if (is_array($registerDate)) {
            $useMinMax = false;
            if (isset($registerDate['min'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_REGISTERDATE, $registerDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($registerDate['max'])) {
                $this->addUsingAlias(UserTableMap::COL_USER_REGISTERDATE, $registerDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_REGISTERDATE, $registerDate, $comparison);
    }

    /**
     * Filter the query on the user_level column
     *
     * Example usage:
     * <code>
     * $query->filterByLevel('fooValue');   // WHERE user_level = 'fooValue'
     * $query->filterByLevel('%fooValue%', Criteria::LIKE); // WHERE user_level LIKE '%fooValue%'
     * </code>
     *
     * @param     string $level The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function filterByLevel($level = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($level)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserTableMap::COL_USER_LEVEL, $level, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildUser $user Object to remove from the list of results
     *
     * @return $this|ChildUserQuery The current query, for fluid interface
     */
    public function prune($user = null)
    {
        if ($user) {
            $this->addUsingAlias(UserTableMap::COL_USER_ID, $user->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            UserTableMap::clearInstancePool();
            UserTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(UserTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            
            UserTableMap::removeInstanceFromPool($criteria);
        
            $affectedRows += ModelCriteria::delete($con);
            UserTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // UserQuery

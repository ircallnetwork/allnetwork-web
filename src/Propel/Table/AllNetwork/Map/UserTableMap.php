<?php

namespace Propel\Table\AllNetwork\Map;

use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\InstancePoolTrait;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\DataFetcher\DataFetcherInterface;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\RelationMap;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Map\TableMapTrait;
use Propel\Table\AllNetwork\User;
use Propel\Table\AllNetwork\UserQuery;


/**
 * This class defines the structure of the 'user' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class UserTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Table.AllNetwork.Map.UserTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'user';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\Table\\AllNetwork\\User';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.Table.AllNetwork.User';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 14;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 14;

    /**
     * the column name for the user_id field
     */
    const COL_USER_ID = 'user.user_id';

    /**
     * the column name for the user_name field
     */
    const COL_USER_NAME = 'user.user_name';

    /**
     * the column name for the user_email field
     */
    const COL_USER_EMAIL = 'user.user_email';

    /**
     * the column name for the user_firstname field
     */
    const COL_USER_FIRSTNAME = 'user.user_firstname';

    /**
     * the column name for the user_lastname field
     */
    const COL_USER_LASTNAME = 'user.user_lastname';

    /**
     * the column name for the user_photo field
     */
    const COL_USER_PHOTO = 'user.user_photo';

    /**
     * the column name for the user_password field
     */
    const COL_USER_PASSWORD = 'user.user_password';

    /**
     * the column name for the user_key field
     */
    const COL_USER_KEY = 'user.user_key';

    /**
     * the column name for the user_status field
     */
    const COL_USER_STATUS = 'user.user_status';

    /**
     * the column name for the user_su field
     */
    const COL_USER_SU = 'user.user_su';

    /**
     * the column name for the user_expired field
     */
    const COL_USER_EXPIRED = 'user.user_expired';

    /**
     * the column name for the user_ipaddress field
     */
    const COL_USER_IPADDRESS = 'user.user_ipaddress';

    /**
     * the column name for the user_registerdate field
     */
    const COL_USER_REGISTERDATE = 'user.user_registerdate';

    /**
     * the column name for the user_level field
     */
    const COL_USER_LEVEL = 'user.user_level';

    /**
     * The default string format for model objects of the related table
     */
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldNames[self::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        self::TYPE_PHPNAME       => array('Id', 'Name', 'Email', 'FirstName', 'LastName', 'Photo', 'Password', 'Key', 'Status', 'SuperUser', 'ExpiredDate', 'IPAddress', 'RegisterDate', 'Level', ),
        self::TYPE_CAMELNAME     => array('id', 'name', 'email', 'firstName', 'lastName', 'photo', 'password', 'key', 'status', 'superUser', 'expiredDate', 'iPAddress', 'registerDate', 'level', ),
        self::TYPE_COLNAME       => array(UserTableMap::COL_USER_ID, UserTableMap::COL_USER_NAME, UserTableMap::COL_USER_EMAIL, UserTableMap::COL_USER_FIRSTNAME, UserTableMap::COL_USER_LASTNAME, UserTableMap::COL_USER_PHOTO, UserTableMap::COL_USER_PASSWORD, UserTableMap::COL_USER_KEY, UserTableMap::COL_USER_STATUS, UserTableMap::COL_USER_SU, UserTableMap::COL_USER_EXPIRED, UserTableMap::COL_USER_IPADDRESS, UserTableMap::COL_USER_REGISTERDATE, UserTableMap::COL_USER_LEVEL, ),
        self::TYPE_FIELDNAME     => array('user_id', 'user_name', 'user_email', 'user_firstname', 'user_lastname', 'user_photo', 'user_password', 'user_key', 'user_status', 'user_su', 'user_expired', 'user_ipaddress', 'user_registerdate', 'user_level', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Name' => 1, 'Email' => 2, 'FirstName' => 3, 'LastName' => 4, 'Photo' => 5, 'Password' => 6, 'Key' => 7, 'Status' => 8, 'SuperUser' => 9, 'ExpiredDate' => 10, 'IPAddress' => 11, 'RegisterDate' => 12, 'Level' => 13, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'name' => 1, 'email' => 2, 'firstName' => 3, 'lastName' => 4, 'photo' => 5, 'password' => 6, 'key' => 7, 'status' => 8, 'superUser' => 9, 'expiredDate' => 10, 'iPAddress' => 11, 'registerDate' => 12, 'level' => 13, ),
        self::TYPE_COLNAME       => array(UserTableMap::COL_USER_ID => 0, UserTableMap::COL_USER_NAME => 1, UserTableMap::COL_USER_EMAIL => 2, UserTableMap::COL_USER_FIRSTNAME => 3, UserTableMap::COL_USER_LASTNAME => 4, UserTableMap::COL_USER_PHOTO => 5, UserTableMap::COL_USER_PASSWORD => 6, UserTableMap::COL_USER_KEY => 7, UserTableMap::COL_USER_STATUS => 8, UserTableMap::COL_USER_SU => 9, UserTableMap::COL_USER_EXPIRED => 10, UserTableMap::COL_USER_IPADDRESS => 11, UserTableMap::COL_USER_REGISTERDATE => 12, UserTableMap::COL_USER_LEVEL => 13, ),
        self::TYPE_FIELDNAME     => array('user_id' => 0, 'user_name' => 1, 'user_email' => 2, 'user_firstname' => 3, 'user_lastname' => 4, 'user_photo' => 5, 'user_password' => 6, 'user_key' => 7, 'user_status' => 8, 'user_su' => 9, 'user_expired' => 10, 'user_ipaddress' => 11, 'user_registerdate' => 12, 'user_level' => 13, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, )
    );

    /**
     * Initialize the table attributes and columns
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('user');
        $this->setPhpName('User');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\Table\\AllNetwork\\User');
        $this->setPackage('Propel.Table.AllNetwork');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('user_id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('user_name', 'Name', 'VARCHAR', true, 32, null);
        $this->addColumn('user_email', 'Email', 'VARCHAR', true, 255, null);
        $this->addColumn('user_firstname', 'FirstName', 'VARCHAR', false, 48, null);
        $this->addColumn('user_lastname', 'LastName', 'VARCHAR', false, 48, null);
        $this->addColumn('user_photo', 'Photo', 'CLOB', false, null, null);
        $this->addColumn('user_password', 'Password', 'VARCHAR', false, 255, null);
        $this->addColumn('user_key', 'Key', 'VARCHAR', false, 255, null);
        $this->addColumn('user_status', 'Status', 'CHAR', false, 1, 'p');
        $this->addColumn('user_su', 'SuperUser', 'CHAR', false, 1, 'n');
        $this->addColumn('user_expired', 'ExpiredDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('user_ipaddress', 'IPAddress', 'VARCHAR', false, 128, null);
        $this->addColumn('user_registerdate', 'RegisterDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('user_level', 'Level', 'CHAR', false, 3, 'ACC');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Post', '\\Propel\\Table\\AllNetwork\\Post', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':post_createdby',
    1 => ':user_id',
  ),
), null, null, 'Posts', false);
    } // buildRelations()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return string The primary key hash of the row
     */
    public static function getPrimaryKeyHashFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        // If the PK cannot be derived from the row, return NULL.
        if ($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] === null) {
            return null;
        }

        return null === $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] || is_scalar($row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)]) || is_callable([$row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)], '__toString']) ? (string) $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)] : $row[TableMap::TYPE_NUM == $indexType ? 0 + $offset : static::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param array  $row       resultset row.
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM
     *
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        return (int) $row[
            $indexType == TableMap::TYPE_NUM
                ? 0 + $offset
                : self::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)
        ];
    }
    
    /**
     * The class that the tableMap will make instances of.
     *
     * If $withPrefix is true, the returned path
     * uses a dot-path notation which is translated into a path
     * relative to a location on the PHP include_path.
     * (e.g. path.to.MyClass -> 'path/to/MyClass.php')
     *
     * @param boolean $withPrefix Whether or not to return the path with the class name
     * @return string path.to.ClassName
     */
    public static function getOMClass($withPrefix = true)
    {
        return $withPrefix ? UserTableMap::CLASS_DEFAULT : UserTableMap::OM_CLASS;
    }

    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param array  $row       row returned by DataFetcher->fetch().
     * @param int    $offset    The 0-based offset for reading from the resultset row.
     * @param string $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                 One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                           TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     * @return array           (User object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = UserTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = UserTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + UserTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = UserTableMap::OM_CLASS;
            /** @var User $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            UserTableMap::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }

    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @param DataFetcherInterface $dataFetcher
     * @return array
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function populateObjects(DataFetcherInterface $dataFetcher)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = static::getOMClass(false);
        // populate the object(s)
        while ($row = $dataFetcher->fetch()) {
            $key = UserTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = UserTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var User $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                UserTableMap::addInstanceToPool($obj, $key);
            } // if key exists
        }

        return $results;
    }
    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param Criteria $criteria object containing the columns to add.
     * @param string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(UserTableMap::COL_USER_ID);
            $criteria->addSelectColumn(UserTableMap::COL_USER_NAME);
            $criteria->addSelectColumn(UserTableMap::COL_USER_EMAIL);
            $criteria->addSelectColumn(UserTableMap::COL_USER_FIRSTNAME);
            $criteria->addSelectColumn(UserTableMap::COL_USER_LASTNAME);
            $criteria->addSelectColumn(UserTableMap::COL_USER_PHOTO);
            $criteria->addSelectColumn(UserTableMap::COL_USER_PASSWORD);
            $criteria->addSelectColumn(UserTableMap::COL_USER_KEY);
            $criteria->addSelectColumn(UserTableMap::COL_USER_STATUS);
            $criteria->addSelectColumn(UserTableMap::COL_USER_SU);
            $criteria->addSelectColumn(UserTableMap::COL_USER_EXPIRED);
            $criteria->addSelectColumn(UserTableMap::COL_USER_IPADDRESS);
            $criteria->addSelectColumn(UserTableMap::COL_USER_REGISTERDATE);
            $criteria->addSelectColumn(UserTableMap::COL_USER_LEVEL);
        } else {
            $criteria->addSelectColumn($alias . '.user_id');
            $criteria->addSelectColumn($alias . '.user_name');
            $criteria->addSelectColumn($alias . '.user_email');
            $criteria->addSelectColumn($alias . '.user_firstname');
            $criteria->addSelectColumn($alias . '.user_lastname');
            $criteria->addSelectColumn($alias . '.user_photo');
            $criteria->addSelectColumn($alias . '.user_password');
            $criteria->addSelectColumn($alias . '.user_key');
            $criteria->addSelectColumn($alias . '.user_status');
            $criteria->addSelectColumn($alias . '.user_su');
            $criteria->addSelectColumn($alias . '.user_expired');
            $criteria->addSelectColumn($alias . '.user_ipaddress');
            $criteria->addSelectColumn($alias . '.user_registerdate');
            $criteria->addSelectColumn($alias . '.user_level');
        }
    }

    /**
     * Returns the TableMap related to this object.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getServiceContainer()->getDatabaseMap(UserTableMap::DATABASE_NAME)->getTable(UserTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(UserTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(UserTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new UserTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a User or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or User object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param  ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, ConnectionInterface $con = null)
     {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\Table\AllNetwork\User) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(UserTableMap::DATABASE_NAME);
            $criteria->add(UserTableMap::COL_USER_ID, (array) $values, Criteria::IN);
        }

        $query = UserQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            UserTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                UserTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the user table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return UserQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a User or Criteria object.
     *
     * @param mixed               $criteria Criteria or User object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from User object
        }

        if ($criteria->containsKey(UserTableMap::COL_USER_ID) && $criteria->keyContainsValue(UserTableMap::COL_USER_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.UserTableMap::COL_USER_ID.')');
        }


        // Set the correct dbName
        $query = UserQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // UserTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
UserTableMap::buildTableMap();

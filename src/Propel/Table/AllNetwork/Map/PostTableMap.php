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
use Propel\Table\AllNetwork\Post;
use Propel\Table\AllNetwork\PostQuery;


/**
 * This class defines the structure of the 'post' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 */
class PostTableMap extends TableMap
{
    use InstancePoolTrait;
    use TableMapTrait;

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'Propel.Table.AllNetwork.Map.PostTableMap';

    /**
     * The default database name for this class
     */
    const DATABASE_NAME = 'default';

    /**
     * The table name for this class
     */
    const TABLE_NAME = 'post';

    /**
     * The related Propel class for this table
     */
    const OM_CLASS = '\\Propel\\Table\\AllNetwork\\Post';

    /**
     * A class that can be returned by this tableMap
     */
    const CLASS_DEFAULT = 'Propel.Table.AllNetwork.Post';

    /**
     * The total number of columns
     */
    const NUM_COLUMNS = 9;

    /**
     * The number of lazy-loaded columns
     */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /**
     * The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS)
     */
    const NUM_HYDRATE_COLUMNS = 9;

    /**
     * the column name for the post_id field
     */
    const COL_POST_ID = 'post.post_id';

    /**
     * the column name for the post_title field
     */
    const COL_POST_TITLE = 'post.post_title';

    /**
     * the column name for the post_slug field
     */
    const COL_POST_SLUG = 'post.post_slug';

    /**
     * the column name for the post_content field
     */
    const COL_POST_CONTENT = 'post.post_content';

    /**
     * the column name for the post_image field
     */
    const COL_POST_IMAGE = 'post.post_image';

    /**
     * the column name for the post_createdby field
     */
    const COL_POST_CREATEDBY = 'post.post_createdby';

    /**
     * the column name for the post_createddate field
     */
    const COL_POST_CREATEDDATE = 'post.post_createddate';

    /**
     * the column name for the post_publishdate field
     */
    const COL_POST_PUBLISHDATE = 'post.post_publishdate';

    /**
     * the column name for the post_status field
     */
    const COL_POST_STATUS = 'post.post_status';

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
        self::TYPE_PHPNAME       => array('Id', 'Title', 'Slug', 'Content', 'Image', 'CreatedBy', 'CreatedDate', 'PublishDate', 'Status', ),
        self::TYPE_CAMELNAME     => array('id', 'title', 'slug', 'content', 'image', 'createdBy', 'createdDate', 'publishDate', 'status', ),
        self::TYPE_COLNAME       => array(PostTableMap::COL_POST_ID, PostTableMap::COL_POST_TITLE, PostTableMap::COL_POST_SLUG, PostTableMap::COL_POST_CONTENT, PostTableMap::COL_POST_IMAGE, PostTableMap::COL_POST_CREATEDBY, PostTableMap::COL_POST_CREATEDDATE, PostTableMap::COL_POST_PUBLISHDATE, PostTableMap::COL_POST_STATUS, ),
        self::TYPE_FIELDNAME     => array('post_id', 'post_title', 'post_slug', 'post_content', 'post_image', 'post_createdby', 'post_createddate', 'post_publishdate', 'post_status', ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. self::$fieldKeys[self::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        self::TYPE_PHPNAME       => array('Id' => 0, 'Title' => 1, 'Slug' => 2, 'Content' => 3, 'Image' => 4, 'CreatedBy' => 5, 'CreatedDate' => 6, 'PublishDate' => 7, 'Status' => 8, ),
        self::TYPE_CAMELNAME     => array('id' => 0, 'title' => 1, 'slug' => 2, 'content' => 3, 'image' => 4, 'createdBy' => 5, 'createdDate' => 6, 'publishDate' => 7, 'status' => 8, ),
        self::TYPE_COLNAME       => array(PostTableMap::COL_POST_ID => 0, PostTableMap::COL_POST_TITLE => 1, PostTableMap::COL_POST_SLUG => 2, PostTableMap::COL_POST_CONTENT => 3, PostTableMap::COL_POST_IMAGE => 4, PostTableMap::COL_POST_CREATEDBY => 5, PostTableMap::COL_POST_CREATEDDATE => 6, PostTableMap::COL_POST_PUBLISHDATE => 7, PostTableMap::COL_POST_STATUS => 8, ),
        self::TYPE_FIELDNAME     => array('post_id' => 0, 'post_title' => 1, 'post_slug' => 2, 'post_content' => 3, 'post_image' => 4, 'post_createdby' => 5, 'post_createddate' => 6, 'post_publishdate' => 7, 'post_status' => 8, ),
        self::TYPE_NUM           => array(0, 1, 2, 3, 4, 5, 6, 7, 8, )
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
        $this->setName('post');
        $this->setPhpName('Post');
        $this->setIdentifierQuoting(false);
        $this->setClassName('\\Propel\\Table\\AllNetwork\\Post');
        $this->setPackage('Propel.Table.AllNetwork');
        $this->setUseIdGenerator(true);
        // columns
        $this->addPrimaryKey('post_id', 'Id', 'INTEGER', true, null, null);
        $this->addColumn('post_title', 'Title', 'VARCHAR', true, 160, null);
        $this->addColumn('post_slug', 'Slug', 'VARCHAR', true, 200, null);
        $this->addColumn('post_content', 'Content', 'CLOB', false, null, null);
        $this->addColumn('post_image', 'Image', 'CLOB', false, null, null);
        $this->addForeignKey('post_createdby', 'CreatedBy', 'INTEGER', 'user', 'user_id', true, null, null);
        $this->addColumn('post_createddate', 'CreatedDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('post_publishdate', 'PublishDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('post_status', 'Status', 'CHAR', false, 1, 'p');
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('User', '\\Propel\\Table\\AllNetwork\\User', RelationMap::MANY_TO_ONE, array (
  0 =>
  array (
    0 => ':post_createdby',
    1 => ':user_id',
  ),
), null, null, null, false);
        $this->addRelation('PostTag', '\\Propel\\Table\\AllNetwork\\PostTag', RelationMap::ONE_TO_MANY, array (
  0 =>
  array (
    0 => ':posttag_post',
    1 => ':post_id',
  ),
), null, null, 'PostTags', false);
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
        return $withPrefix ? PostTableMap::CLASS_DEFAULT : PostTableMap::OM_CLASS;
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
     * @return array           (Post object, last column rank)
     */
    public static function populateObject($row, $offset = 0, $indexType = TableMap::TYPE_NUM)
    {
        $key = PostTableMap::getPrimaryKeyHashFromRow($row, $offset, $indexType);
        if (null !== ($obj = PostTableMap::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $offset, true); // rehydrate
            $col = $offset + PostTableMap::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = PostTableMap::OM_CLASS;
            /** @var Post $obj */
            $obj = new $cls();
            $col = $obj->hydrate($row, $offset, false, $indexType);
            PostTableMap::addInstanceToPool($obj, $key);
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
            $key = PostTableMap::getPrimaryKeyHashFromRow($row, 0, $dataFetcher->getIndexType());
            if (null !== ($obj = PostTableMap::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                /** @var Post $obj */
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                PostTableMap::addInstanceToPool($obj, $key);
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
            $criteria->addSelectColumn(PostTableMap::COL_POST_ID);
            $criteria->addSelectColumn(PostTableMap::COL_POST_TITLE);
            $criteria->addSelectColumn(PostTableMap::COL_POST_SLUG);
            $criteria->addSelectColumn(PostTableMap::COL_POST_CONTENT);
            $criteria->addSelectColumn(PostTableMap::COL_POST_IMAGE);
            $criteria->addSelectColumn(PostTableMap::COL_POST_CREATEDBY);
            $criteria->addSelectColumn(PostTableMap::COL_POST_CREATEDDATE);
            $criteria->addSelectColumn(PostTableMap::COL_POST_PUBLISHDATE);
            $criteria->addSelectColumn(PostTableMap::COL_POST_STATUS);
        } else {
            $criteria->addSelectColumn($alias . '.post_id');
            $criteria->addSelectColumn($alias . '.post_title');
            $criteria->addSelectColumn($alias . '.post_slug');
            $criteria->addSelectColumn($alias . '.post_content');
            $criteria->addSelectColumn($alias . '.post_image');
            $criteria->addSelectColumn($alias . '.post_createdby');
            $criteria->addSelectColumn($alias . '.post_createddate');
            $criteria->addSelectColumn($alias . '.post_publishdate');
            $criteria->addSelectColumn($alias . '.post_status');
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
        return Propel::getServiceContainer()->getDatabaseMap(PostTableMap::DATABASE_NAME)->getTable(PostTableMap::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this tableMap class.
     */
    public static function buildTableMap()
    {
        $dbMap = Propel::getServiceContainer()->getDatabaseMap(PostTableMap::DATABASE_NAME);
        if (!$dbMap->hasTable(PostTableMap::TABLE_NAME)) {
            $dbMap->addTableObject(new PostTableMap());
        }
    }

    /**
     * Performs a DELETE on the database, given a Post or Criteria object OR a primary key value.
     *
     * @param mixed               $values Criteria or Post object or primary key or array of primary keys
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
            $con = Propel::getServiceContainer()->getWriteConnection(PostTableMap::DATABASE_NAME);
        }

        if ($values instanceof Criteria) {
            // rename for clarity
            $criteria = $values;
        } elseif ($values instanceof \Propel\Table\AllNetwork\Post) { // it's a model object
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(PostTableMap::DATABASE_NAME);
            $criteria->add(PostTableMap::COL_POST_ID, (array) $values, Criteria::IN);
        }

        $query = PostQuery::create()->mergeWith($criteria);

        if ($values instanceof Criteria) {
            PostTableMap::clearInstancePool();
        } elseif (!is_object($values)) { // it's a primary key, or an array of pks
            foreach ((array) $values as $singleval) {
                PostTableMap::removeInstanceFromPool($singleval);
            }
        }

        return $query->delete($con);
    }

    /**
     * Deletes all rows from the post table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public static function doDeleteAll(ConnectionInterface $con = null)
    {
        return PostQuery::create()->doDeleteAll($con);
    }

    /**
     * Performs an INSERT on the database, given a Post or Criteria object.
     *
     * @param mixed               $criteria Criteria or Post object containing data that is used to create the INSERT statement.
     * @param ConnectionInterface $con the ConnectionInterface connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public static function doInsert($criteria, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostTableMap::DATABASE_NAME);
        }

        if ($criteria instanceof Criteria) {
            $criteria = clone $criteria; // rename for clarity
        } else {
            $criteria = $criteria->buildCriteria(); // build Criteria from Post object
        }

        if ($criteria->containsKey(PostTableMap::COL_POST_ID) && $criteria->keyContainsValue(PostTableMap::COL_POST_ID) ) {
            throw new PropelException('Cannot insert a value for auto-increment primary key ('.PostTableMap::COL_POST_ID.')');
        }


        // Set the correct dbName
        $query = PostQuery::create()->mergeWith($criteria);

        // use transaction because $criteria could contain info
        // for more than one table (I guess, conceivably)
        return $con->transaction(function () use ($con, $query) {
            return $query->doInsert($con);
        });
    }

} // PostTableMap
// This is the static code needed to register the TableMap for this table with the main Propel class.
//
PostTableMap::buildTableMap();

<?php

namespace Propel\Table\AllNetwork\Base;

use \DateTime;
use \Exception;
use \PDO;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;
use Propel\Table\AllNetwork\Post as ChildPost;
use Propel\Table\AllNetwork\PostQuery as ChildPostQuery;
use Propel\Table\AllNetwork\PostTag as ChildPostTag;
use Propel\Table\AllNetwork\PostTagQuery as ChildPostTagQuery;
use Propel\Table\AllNetwork\User as ChildUser;
use Propel\Table\AllNetwork\UserQuery as ChildUserQuery;
use Propel\Table\AllNetwork\Map\PostTableMap;
use Propel\Table\AllNetwork\Map\PostTagTableMap;

/**
 * Base class that represents a row from the 'post' table.
 *
 * 
 *
 * @package    propel.generator.Propel.Table.AllNetwork.Base
 */
abstract class Post implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Table\\AllNetwork\\Map\\PostTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the post_id field.
     * 
     * @var        int
     */
    protected $post_id;

    /**
     * The value for the post_title field.
     * 
     * @var        string
     */
    protected $post_title;

    /**
     * The value for the post_slug field.
     * 
     * @var        string
     */
    protected $post_slug;

    /**
     * The value for the post_content field.
     * 
     * @var        string
     */
    protected $post_content;

    /**
     * The value for the post_image field.
     * 
     * @var        string
     */
    protected $post_image;

    /**
     * The value for the post_createdby field.
     * 
     * @var        int
     */
    protected $post_createdby;

    /**
     * The value for the post_createddate field.
     * 
     * @var        DateTime
     */
    protected $post_createddate;

    /**
     * The value for the post_publishdate field.
     * 
     * @var        DateTime
     */
    protected $post_publishdate;

    /**
     * The value for the post_status field.
     * 
     * Note: this column has a database default value of: 'p'
     * @var        string
     */
    protected $post_status;

    /**
     * @var        ChildUser
     */
    protected $aUser;

    /**
     * @var        ObjectCollection|ChildPostTag[] Collection to store aggregation of ChildPostTag objects.
     */
    protected $collPostTags;
    protected $collPostTagsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildPostTag[]
     */
    protected $postTagsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->post_status = 'p';
    }

    /**
     * Initializes internal state of Propel\Table\AllNetwork\Base\Post object.
     * @see applyDefaults()
     */
    public function __construct()
    {
        $this->applyDefaultValues();
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Post</code> instance.  If
     * <code>obj</code> is an instance of <code>Post</code>, delegates to
     * <code>equals(Post)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Post The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));
        
        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }
        
        return $propertyNames;
    }

    /**
     * Get the [post_id] column value.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->post_id;
    }

    /**
     * Get the [post_title] column value.
     * 
     * @return string
     */
    public function getTitle()
    {
        return $this->post_title;
    }

    /**
     * Get the [post_slug] column value.
     * 
     * @return string
     */
    public function getSlug()
    {
        return $this->post_slug;
    }

    /**
     * Get the [post_content] column value.
     * 
     * @return string
     */
    public function getContent()
    {
        return $this->post_content;
    }

    /**
     * Get the [post_image] column value.
     * 
     * @return string
     */
    public function getImage()
    {
        return $this->post_image;
    }

    /**
     * Get the [post_createdby] column value.
     * 
     * @return int
     */
    public function getCreatedBy()
    {
        return $this->post_createdby;
    }

    /**
     * Get the [optionally formatted] temporal [post_createddate] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreatedDate($format = NULL)
    {
        if ($format === null) {
            return $this->post_createddate;
        } else {
            return $this->post_createddate instanceof \DateTimeInterface ? $this->post_createddate->format($format) : null;
        }
    }

    /**
     * Get the [optionally formatted] temporal [post_publishdate] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL, and 0 if column value is 0000-00-00 00:00:00
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getPublishDate($format = NULL)
    {
        if ($format === null) {
            return $this->post_publishdate;
        } else {
            return $this->post_publishdate instanceof \DateTimeInterface ? $this->post_publishdate->format($format) : null;
        }
    }

    /**
     * Get the [post_status] column value.
     * 
     * @return string
     */
    public function getStatus()
    {
        return $this->post_status;
    }

    /**
     * Set the value of [post_id] column.
     * 
     * @param int $v new value
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->post_id !== $v) {
            $this->post_id = $v;
            $this->modifiedColumns[PostTableMap::COL_POST_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [post_title] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function setTitle($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->post_title !== $v) {
            $this->post_title = $v;
            $this->modifiedColumns[PostTableMap::COL_POST_TITLE] = true;
        }

        return $this;
    } // setTitle()

    /**
     * Set the value of [post_slug] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function setSlug($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->post_slug !== $v) {
            $this->post_slug = $v;
            $this->modifiedColumns[PostTableMap::COL_POST_SLUG] = true;
        }

        return $this;
    } // setSlug()

    /**
     * Set the value of [post_content] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function setContent($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->post_content !== $v) {
            $this->post_content = $v;
            $this->modifiedColumns[PostTableMap::COL_POST_CONTENT] = true;
        }

        return $this;
    } // setContent()

    /**
     * Set the value of [post_image] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function setImage($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->post_image !== $v) {
            $this->post_image = $v;
            $this->modifiedColumns[PostTableMap::COL_POST_IMAGE] = true;
        }

        return $this;
    } // setImage()

    /**
     * Set the value of [post_createdby] column.
     * 
     * @param int $v new value
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function setCreatedBy($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->post_createdby !== $v) {
            $this->post_createdby = $v;
            $this->modifiedColumns[PostTableMap::COL_POST_CREATEDBY] = true;
        }

        if ($this->aUser !== null && $this->aUser->getId() !== $v) {
            $this->aUser = null;
        }

        return $this;
    } // setCreatedBy()

    /**
     * Sets the value of [post_createddate] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function setCreatedDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->post_createddate !== null || $dt !== null) {
            if ($this->post_createddate === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->post_createddate->format("Y-m-d H:i:s.u")) {
                $this->post_createddate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PostTableMap::COL_POST_CREATEDDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setCreatedDate()

    /**
     * Sets the value of [post_publishdate] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function setPublishDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->post_publishdate !== null || $dt !== null) {
            if ($this->post_publishdate === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->post_publishdate->format("Y-m-d H:i:s.u")) {
                $this->post_publishdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[PostTableMap::COL_POST_PUBLISHDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setPublishDate()

    /**
     * Set the value of [post_status] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->post_status !== $v) {
            $this->post_status = $v;
            $this->modifiedColumns[PostTableMap::COL_POST_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->post_status !== 'p') {
                return false;
            }

        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : PostTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->post_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : PostTableMap::translateFieldName('Title', TableMap::TYPE_PHPNAME, $indexType)];
            $this->post_title = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : PostTableMap::translateFieldName('Slug', TableMap::TYPE_PHPNAME, $indexType)];
            $this->post_slug = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : PostTableMap::translateFieldName('Content', TableMap::TYPE_PHPNAME, $indexType)];
            $this->post_content = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : PostTableMap::translateFieldName('Image', TableMap::TYPE_PHPNAME, $indexType)];
            $this->post_image = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : PostTableMap::translateFieldName('CreatedBy', TableMap::TYPE_PHPNAME, $indexType)];
            $this->post_createdby = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : PostTableMap::translateFieldName('CreatedDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->post_createddate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : PostTableMap::translateFieldName('PublishDate', TableMap::TYPE_PHPNAME, $indexType)];
            if ($col === '0000-00-00 00:00:00') {
                $col = null;
            }
            $this->post_publishdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : PostTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->post_status = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 9; // 9 = PostTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\Table\\AllNetwork\\Post'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aUser !== null && $this->post_createdby !== $this->aUser->getId()) {
            $this->aUser = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(PostTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildPostQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUser = null;
            $this->collPostTags = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Post::setDeleted()
     * @see Post::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildPostQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }
 
        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(PostTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                PostTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aUser !== null) {
                if ($this->aUser->isModified() || $this->aUser->isNew()) {
                    $affectedRows += $this->aUser->save($con);
                }
                $this->setUser($this->aUser);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->postTagsScheduledForDeletion !== null) {
                if (!$this->postTagsScheduledForDeletion->isEmpty()) {
                    \Propel\Table\AllNetwork\PostTagQuery::create()
                        ->filterByPrimaryKeys($this->postTagsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->postTagsScheduledForDeletion = null;
                }
            }

            if ($this->collPostTags !== null) {
                foreach ($this->collPostTags as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[PostTableMap::COL_POST_ID] = true;
        if (null !== $this->post_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . PostTableMap::COL_POST_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(PostTableMap::COL_POST_ID)) {
            $modifiedColumns[':p' . $index++]  = 'post_id';
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_TITLE)) {
            $modifiedColumns[':p' . $index++]  = 'post_title';
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_SLUG)) {
            $modifiedColumns[':p' . $index++]  = 'post_slug';
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_CONTENT)) {
            $modifiedColumns[':p' . $index++]  = 'post_content';
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_IMAGE)) {
            $modifiedColumns[':p' . $index++]  = 'post_image';
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_CREATEDBY)) {
            $modifiedColumns[':p' . $index++]  = 'post_createdby';
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_CREATEDDATE)) {
            $modifiedColumns[':p' . $index++]  = 'post_createddate';
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_PUBLISHDATE)) {
            $modifiedColumns[':p' . $index++]  = 'post_publishdate';
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'post_status';
        }

        $sql = sprintf(
            'INSERT INTO post (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'post_id':                        
                        $stmt->bindValue($identifier, $this->post_id, PDO::PARAM_INT);
                        break;
                    case 'post_title':                        
                        $stmt->bindValue($identifier, $this->post_title, PDO::PARAM_STR);
                        break;
                    case 'post_slug':                        
                        $stmt->bindValue($identifier, $this->post_slug, PDO::PARAM_STR);
                        break;
                    case 'post_content':                        
                        $stmt->bindValue($identifier, $this->post_content, PDO::PARAM_STR);
                        break;
                    case 'post_image':                        
                        $stmt->bindValue($identifier, $this->post_image, PDO::PARAM_STR);
                        break;
                    case 'post_createdby':                        
                        $stmt->bindValue($identifier, $this->post_createdby, PDO::PARAM_INT);
                        break;
                    case 'post_createddate':                        
                        $stmt->bindValue($identifier, $this->post_createddate ? $this->post_createddate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'post_publishdate':                        
                        $stmt->bindValue($identifier, $this->post_publishdate ? $this->post_publishdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'post_status':                        
                        $stmt->bindValue($identifier, $this->post_status, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setId($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PostTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getId();
                break;
            case 1:
                return $this->getTitle();
                break;
            case 2:
                return $this->getSlug();
                break;
            case 3:
                return $this->getContent();
                break;
            case 4:
                return $this->getImage();
                break;
            case 5:
                return $this->getCreatedBy();
                break;
            case 6:
                return $this->getCreatedDate();
                break;
            case 7:
                return $this->getPublishDate();
                break;
            case 8:
                return $this->getStatus();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Post'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Post'][$this->hashCode()] = true;
        $keys = PostTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getTitle(),
            $keys[2] => $this->getSlug(),
            $keys[3] => $this->getContent(),
            $keys[4] => $this->getImage(),
            $keys[5] => $this->getCreatedBy(),
            $keys[6] => $this->getCreatedDate(),
            $keys[7] => $this->getPublishDate(),
            $keys[8] => $this->getStatus(),
        );
        if ($result[$keys[6]] instanceof \DateTime) {
            $result[$keys[6]] = $result[$keys[6]]->format('c');
        }
        
        if ($result[$keys[7]] instanceof \DateTime) {
            $result[$keys[7]] = $result[$keys[7]]->format('c');
        }
        
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }
        
        if ($includeForeignObjects) {
            if (null !== $this->aUser) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'user';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'user';
                        break;
                    default:
                        $key = 'User';
                }
        
                $result[$key] = $this->aUser->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collPostTags) {
                
                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'postTags';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'posttags';
                        break;
                    default:
                        $key = 'PostTags';
                }
        
                $result[$key] = $this->collPostTags->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Propel\Table\AllNetwork\Post
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = PostTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\Table\AllNetwork\Post
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setTitle($value);
                break;
            case 2:
                $this->setSlug($value);
                break;
            case 3:
                $this->setContent($value);
                break;
            case 4:
                $this->setImage($value);
                break;
            case 5:
                $this->setCreatedBy($value);
                break;
            case 6:
                $this->setCreatedDate($value);
                break;
            case 7:
                $this->setPublishDate($value);
                break;
            case 8:
                $this->setStatus($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = PostTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setTitle($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setSlug($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setContent($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setImage($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setCreatedBy($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setCreatedDate($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPublishDate($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setStatus($arr[$keys[8]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Propel\Table\AllNetwork\Post The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PostTableMap::DATABASE_NAME);

        if ($this->isColumnModified(PostTableMap::COL_POST_ID)) {
            $criteria->add(PostTableMap::COL_POST_ID, $this->post_id);
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_TITLE)) {
            $criteria->add(PostTableMap::COL_POST_TITLE, $this->post_title);
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_SLUG)) {
            $criteria->add(PostTableMap::COL_POST_SLUG, $this->post_slug);
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_CONTENT)) {
            $criteria->add(PostTableMap::COL_POST_CONTENT, $this->post_content);
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_IMAGE)) {
            $criteria->add(PostTableMap::COL_POST_IMAGE, $this->post_image);
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_CREATEDBY)) {
            $criteria->add(PostTableMap::COL_POST_CREATEDBY, $this->post_createdby);
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_CREATEDDATE)) {
            $criteria->add(PostTableMap::COL_POST_CREATEDDATE, $this->post_createddate);
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_PUBLISHDATE)) {
            $criteria->add(PostTableMap::COL_POST_PUBLISHDATE, $this->post_publishdate);
        }
        if ($this->isColumnModified(PostTableMap::COL_POST_STATUS)) {
            $criteria->add(PostTableMap::COL_POST_STATUS, $this->post_status);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildPostQuery::create();
        $criteria->add(PostTableMap::COL_POST_ID, $this->post_id);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getId();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }
        
    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getId();
    }

    /**
     * Generic method to set the primary key (post_id column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Propel\Table\AllNetwork\Post (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTitle($this->getTitle());
        $copyObj->setSlug($this->getSlug());
        $copyObj->setContent($this->getContent());
        $copyObj->setImage($this->getImage());
        $copyObj->setCreatedBy($this->getCreatedBy());
        $copyObj->setCreatedDate($this->getCreatedDate());
        $copyObj->setPublishDate($this->getPublishDate());
        $copyObj->setStatus($this->getStatus());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getPostTags() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPostTag($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setId(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Propel\Table\AllNetwork\Post Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildUser object.
     *
     * @param  ChildUser $v
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUser(ChildUser $v = null)
    {
        if ($v === null) {
            $this->setCreatedBy(NULL);
        } else {
            $this->setCreatedBy($v->getId());
        }

        $this->aUser = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildUser object, it will not be re-added.
        if ($v !== null) {
            $v->addPost($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildUser object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildUser The associated ChildUser object.
     * @throws PropelException
     */
    public function getUser(ConnectionInterface $con = null)
    {
        if ($this->aUser === null && ($this->post_createdby !== null)) {
            $this->aUser = ChildUserQuery::create()->findPk($this->post_createdby, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUser->addPosts($this);
             */
        }

        return $this->aUser;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('PostTag' == $relationName) {
            return $this->initPostTags();
        }
    }

    /**
     * Clears out the collPostTags collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addPostTags()
     */
    public function clearPostTags()
    {
        $this->collPostTags = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collPostTags collection loaded partially.
     */
    public function resetPartialPostTags($v = true)
    {
        $this->collPostTagsPartial = $v;
    }

    /**
     * Initializes the collPostTags collection.
     *
     * By default this just sets the collPostTags collection to an empty array (like clearcollPostTags());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPostTags($overrideExisting = true)
    {
        if (null !== $this->collPostTags && !$overrideExisting) {
            return;
        }

        $collectionClassName = PostTagTableMap::getTableMap()->getCollectionClassName();

        $this->collPostTags = new $collectionClassName;
        $this->collPostTags->setModel('\Propel\Table\AllNetwork\PostTag');
    }

    /**
     * Gets an array of ChildPostTag objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildPost is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildPostTag[] List of ChildPostTag objects
     * @throws PropelException
     */
    public function getPostTags(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collPostTagsPartial && !$this->isNew();
        if (null === $this->collPostTags || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPostTags) {
                // return empty collection
                $this->initPostTags();
            } else {
                $collPostTags = ChildPostTagQuery::create(null, $criteria)
                    ->filterByPost($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collPostTagsPartial && count($collPostTags)) {
                        $this->initPostTags(false);

                        foreach ($collPostTags as $obj) {
                            if (false == $this->collPostTags->contains($obj)) {
                                $this->collPostTags->append($obj);
                            }
                        }

                        $this->collPostTagsPartial = true;
                    }

                    return $collPostTags;
                }

                if ($partial && $this->collPostTags) {
                    foreach ($this->collPostTags as $obj) {
                        if ($obj->isNew()) {
                            $collPostTags[] = $obj;
                        }
                    }
                }

                $this->collPostTags = $collPostTags;
                $this->collPostTagsPartial = false;
            }
        }

        return $this->collPostTags;
    }

    /**
     * Sets a collection of ChildPostTag objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $postTags A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildPost The current object (for fluent API support)
     */
    public function setPostTags(Collection $postTags, ConnectionInterface $con = null)
    {
        /** @var ChildPostTag[] $postTagsToDelete */
        $postTagsToDelete = $this->getPostTags(new Criteria(), $con)->diff($postTags);

        
        //since at least one column in the foreign key is at the same time a PK
        //we can not just set a PK to NULL in the lines below. We have to store
        //a backup of all values, so we are able to manipulate these items based on the onDelete value later.
        $this->postTagsScheduledForDeletion = clone $postTagsToDelete;

        foreach ($postTagsToDelete as $postTagRemoved) {
            $postTagRemoved->setPost(null);
        }

        $this->collPostTags = null;
        foreach ($postTags as $postTag) {
            $this->addPostTag($postTag);
        }

        $this->collPostTags = $postTags;
        $this->collPostTagsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PostTag objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related PostTag objects.
     * @throws PropelException
     */
    public function countPostTags(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collPostTagsPartial && !$this->isNew();
        if (null === $this->collPostTags || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPostTags) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getPostTags());
            }

            $query = ChildPostTagQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPost($this)
                ->count($con);
        }

        return count($this->collPostTags);
    }

    /**
     * Method called to associate a ChildPostTag object to this object
     * through the ChildPostTag foreign key attribute.
     *
     * @param  ChildPostTag $l ChildPostTag
     * @return $this|\Propel\Table\AllNetwork\Post The current object (for fluent API support)
     */
    public function addPostTag(ChildPostTag $l)
    {
        if ($this->collPostTags === null) {
            $this->initPostTags();
            $this->collPostTagsPartial = true;
        }

        if (!$this->collPostTags->contains($l)) {
            $this->doAddPostTag($l);

            if ($this->postTagsScheduledForDeletion and $this->postTagsScheduledForDeletion->contains($l)) {
                $this->postTagsScheduledForDeletion->remove($this->postTagsScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildPostTag $postTag The ChildPostTag object to add.
     */
    protected function doAddPostTag(ChildPostTag $postTag)
    {
        $this->collPostTags[]= $postTag;
        $postTag->setPost($this);
    }

    /**
     * @param  ChildPostTag $postTag The ChildPostTag object to remove.
     * @return $this|ChildPost The current object (for fluent API support)
     */
    public function removePostTag(ChildPostTag $postTag)
    {
        if ($this->getPostTags()->contains($postTag)) {
            $pos = $this->collPostTags->search($postTag);
            $this->collPostTags->remove($pos);
            if (null === $this->postTagsScheduledForDeletion) {
                $this->postTagsScheduledForDeletion = clone $this->collPostTags;
                $this->postTagsScheduledForDeletion->clear();
            }
            $this->postTagsScheduledForDeletion[]= clone $postTag;
            $postTag->setPost(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Post is new, it will return
     * an empty collection; or if this Post has previously
     * been saved, it will retrieve related PostTags from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Post.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildPostTag[] List of ChildPostTag objects
     */
    public function getPostTagsJoinTag(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildPostTagQuery::create(null, $criteria);
        $query->joinWith('Tag', $joinBehavior);

        return $this->getPostTags($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aUser) {
            $this->aUser->removePost($this);
        }
        $this->post_id = null;
        $this->post_title = null;
        $this->post_slug = null;
        $this->post_content = null;
        $this->post_image = null;
        $this->post_createdby = null;
        $this->post_createddate = null;
        $this->post_publishdate = null;
        $this->post_status = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collPostTags) {
                foreach ($this->collPostTags as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collPostTags = null;
        $this->aUser = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string The value of the 'post_title' column
     */
    public function __toString()
    {
        return (string) $this->getTitle();
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}

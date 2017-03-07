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
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;
use Propel\Runtime\Util\PropelDateTime;
use Propel\Table\AllNetwork\UserQuery as ChildUserQuery;
use Propel\Table\AllNetwork\Map\UserTableMap;

/**
 * Base class that represents a row from the 'user' table.
 *
 * 
 *
 * @package    propel.generator.Propel.Table.AllNetwork.Base
 */
abstract class User implements ActiveRecordInterface 
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Propel\\Table\\AllNetwork\\Map\\UserTableMap';


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
     * The value for the user_id field.
     * 
     * @var        int
     */
    protected $user_id;

    /**
     * The value for the user_name field.
     * 
     * @var        string
     */
    protected $user_name;

    /**
     * The value for the user_email field.
     * 
     * @var        string
     */
    protected $user_email;

    /**
     * The value for the user_firstname field.
     * 
     * @var        string
     */
    protected $user_firstname;

    /**
     * The value for the user_lastname field.
     * 
     * @var        string
     */
    protected $user_lastname;

    /**
     * The value for the user_photo field.
     * 
     * @var        string
     */
    protected $user_photo;

    /**
     * The value for the user_password field.
     * 
     * @var        string
     */
    protected $user_password;

    /**
     * The value for the user_key field.
     * 
     * @var        string
     */
    protected $user_key;

    /**
     * The value for the user_status field.
     * 
     * Note: this column has a database default value of: 'p'
     * @var        string
     */
    protected $user_status;

    /**
     * The value for the user_su field.
     * 
     * Note: this column has a database default value of: 'n'
     * @var        string
     */
    protected $user_su;

    /**
     * The value for the user_expired field.
     * 
     * @var        DateTime
     */
    protected $user_expired;

    /**
     * The value for the user_ipaddress field.
     * 
     * @var        string
     */
    protected $user_ipaddress;

    /**
     * The value for the user_registerdate field.
     * 
     * @var        DateTime
     */
    protected $user_registerdate;

    /**
     * The value for the user_level field.
     * 
     * Note: this column has a database default value of: 'ACC'
     * @var        string
     */
    protected $user_level;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see __construct()
     */
    public function applyDefaultValues()
    {
        $this->user_status = 'p';
        $this->user_su = 'n';
        $this->user_level = 'ACC';
    }

    /**
     * Initializes internal state of Propel\Table\AllNetwork\Base\User object.
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
     * Compares this with another <code>User</code> instance.  If
     * <code>obj</code> is an instance of <code>User</code>, delegates to
     * <code>equals(User)</code>.  Otherwise, returns <code>false</code>.
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
     * @return $this|User The current object, for fluid interface
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
     * Get the [user_id] column value.
     * 
     * @return int
     */
    public function getId()
    {
        return $this->user_id;
    }

    /**
     * Get the [user_name] column value.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->user_name;
    }

    /**
     * Get the [user_email] column value.
     * 
     * @return string
     */
    public function getEmail()
    {
        return $this->user_email;
    }

    /**
     * Get the [user_firstname] column value.
     * 
     * @return string
     */
    public function getFirstName()
    {
        return $this->user_firstname;
    }

    /**
     * Get the [user_lastname] column value.
     * 
     * @return string
     */
    public function getLastName()
    {
        return $this->user_lastname;
    }

    /**
     * Get the [user_photo] column value.
     * 
     * @return string
     */
    public function getPhoto()
    {
        return $this->user_photo;
    }

    /**
     * Get the [user_password] column value.
     * 
     * @return string
     */
    public function getPassword()
    {
        return $this->user_password;
    }

    /**
     * Get the [user_key] column value.
     * 
     * @return string
     */
    public function getKey()
    {
        return $this->user_key;
    }

    /**
     * Get the [user_status] column value.
     * 
     * @return string
     */
    public function getStatus()
    {
        return $this->user_status;
    }

    /**
     * Get the [user_su] column value.
     * 
     * @return string
     */
    public function getSuperUser()
    {
        return $this->user_su;
    }

    /**
     * Get the [optionally formatted] temporal [user_expired] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getExpiredDate($format = NULL)
    {
        if ($format === null) {
            return $this->user_expired;
        } else {
            return $this->user_expired instanceof \DateTimeInterface ? $this->user_expired->format($format) : null;
        }
    }

    /**
     * Get the [user_ipaddress] column value.
     * 
     * @return string
     */
    public function getIPAddress()
    {
        return $this->user_ipaddress;
    }

    /**
     * Get the [optionally formatted] temporal [user_registerdate] column value.
     * 
     *
     * @param      string $format The date/time format string (either date()-style or strftime()-style).
     *                            If format is NULL, then the raw DateTime object will be returned.
     *
     * @return string|DateTime Formatted date/time value as string or DateTime object (if format is NULL), NULL if column is NULL
     *
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRegisterDate($format = NULL)
    {
        if ($format === null) {
            return $this->user_registerdate;
        } else {
            return $this->user_registerdate instanceof \DateTimeInterface ? $this->user_registerdate->format($format) : null;
        }
    }

    /**
     * Get the [user_level] column value.
     * 
     * @return string
     */
    public function getLevel()
    {
        return $this->user_level;
    }

    /**
     * Set the value of [user_id] column.
     * 
     * @param int $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setId($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->user_id !== $v) {
            $this->user_id = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_ID] = true;
        }

        return $this;
    } // setId()

    /**
     * Set the value of [user_name] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_name !== $v) {
            $this->user_name = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_NAME] = true;
        }

        return $this;
    } // setName()

    /**
     * Set the value of [user_email] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_email !== $v) {
            $this->user_email = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [user_firstname] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setFirstName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_firstname !== $v) {
            $this->user_firstname = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_FIRSTNAME] = true;
        }

        return $this;
    } // setFirstName()

    /**
     * Set the value of [user_lastname] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setLastName($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_lastname !== $v) {
            $this->user_lastname = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_LASTNAME] = true;
        }

        return $this;
    } // setLastName()

    /**
     * Set the value of [user_photo] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setPhoto($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_photo !== $v) {
            $this->user_photo = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_PHOTO] = true;
        }

        return $this;
    } // setPhoto()

    /**
     * Set the value of [user_password] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_password !== $v) {
            $this->user_password = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [user_key] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setKey($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_key !== $v) {
            $this->user_key = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_KEY] = true;
        }

        return $this;
    } // setKey()

    /**
     * Set the value of [user_status] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setStatus($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_status !== $v) {
            $this->user_status = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_STATUS] = true;
        }

        return $this;
    } // setStatus()

    /**
     * Set the value of [user_su] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setSuperUser($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_su !== $v) {
            $this->user_su = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_SU] = true;
        }

        return $this;
    } // setSuperUser()

    /**
     * Sets the value of [user_expired] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->user_expired !== null || $dt !== null) {
            if ($this->user_expired === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->user_expired->format("Y-m-d H:i:s.u")) {
                $this->user_expired = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UserTableMap::COL_USER_EXPIRED] = true;
            }
        } // if either are not null

        return $this;
    } // setExpiredDate()

    /**
     * Set the value of [user_ipaddress] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setIPAddress($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_ipaddress !== $v) {
            $this->user_ipaddress = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_IPADDRESS] = true;
        }

        return $this;
    } // setIPAddress()

    /**
     * Sets the value of [user_registerdate] column to a normalized version of the date/time value specified.
     * 
     * @param  mixed $v string, integer (timestamp), or \DateTimeInterface value.
     *               Empty strings are treated as NULL.
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setRegisterDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->user_registerdate !== null || $dt !== null) {
            if ($this->user_registerdate === null || $dt === null || $dt->format("Y-m-d H:i:s.u") !== $this->user_registerdate->format("Y-m-d H:i:s.u")) {
                $this->user_registerdate = $dt === null ? null : clone $dt;
                $this->modifiedColumns[UserTableMap::COL_USER_REGISTERDATE] = true;
            }
        } // if either are not null

        return $this;
    } // setRegisterDate()

    /**
     * Set the value of [user_level] column.
     * 
     * @param string $v new value
     * @return $this|\Propel\Table\AllNetwork\User The current object (for fluent API support)
     */
    public function setLevel($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->user_level !== $v) {
            $this->user_level = $v;
            $this->modifiedColumns[UserTableMap::COL_USER_LEVEL] = true;
        }

        return $this;
    } // setLevel()

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
            if ($this->user_status !== 'p') {
                return false;
            }

            if ($this->user_su !== 'n') {
                return false;
            }

            if ($this->user_level !== 'ACC') {
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

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : UserTableMap::translateFieldName('Id', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_id = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : UserTableMap::translateFieldName('Name', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_name = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : UserTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : UserTableMap::translateFieldName('FirstName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : UserTableMap::translateFieldName('LastName', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : UserTableMap::translateFieldName('Photo', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_photo = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : UserTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : UserTableMap::translateFieldName('Key', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_key = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : UserTableMap::translateFieldName('Status', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_status = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : UserTableMap::translateFieldName('SuperUser', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_su = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 10 + $startcol : UserTableMap::translateFieldName('ExpiredDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_expired = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 11 + $startcol : UserTableMap::translateFieldName('IPAddress', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_ipaddress = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 12 + $startcol : UserTableMap::translateFieldName('RegisterDate', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_registerdate = (null !== $col) ? PropelDateTime::newInstance($col, null, 'DateTime') : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 13 + $startcol : UserTableMap::translateFieldName('Level', TableMap::TYPE_PHPNAME, $indexType)];
            $this->user_level = (null !== $col) ? (string) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 14; // 14 = UserTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Propel\\Table\\AllNetwork\\User'), 0, $e);
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
            $con = Propel::getServiceContainer()->getReadConnection(UserTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildUserQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see User::setDeleted()
     * @see User::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildUserQuery::create()
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
            $con = Propel::getServiceContainer()->getWriteConnection(UserTableMap::DATABASE_NAME);
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
                UserTableMap::addInstanceToPool($this);
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

        $this->modifiedColumns[UserTableMap::COL_USER_ID] = true;
        if (null !== $this->user_id) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . UserTableMap::COL_USER_ID . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(UserTableMap::COL_USER_ID)) {
            $modifiedColumns[':p' . $index++]  = 'user_id';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_NAME)) {
            $modifiedColumns[':p' . $index++]  = 'user_name';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'user_email';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'user_firstname';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'user_lastname';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_PHOTO)) {
            $modifiedColumns[':p' . $index++]  = 'user_photo';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'user_password';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_KEY)) {
            $modifiedColumns[':p' . $index++]  = 'user_key';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_STATUS)) {
            $modifiedColumns[':p' . $index++]  = 'user_status';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_SU)) {
            $modifiedColumns[':p' . $index++]  = 'user_su';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_EXPIRED)) {
            $modifiedColumns[':p' . $index++]  = 'user_expired';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_IPADDRESS)) {
            $modifiedColumns[':p' . $index++]  = 'user_ipaddress';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_REGISTERDATE)) {
            $modifiedColumns[':p' . $index++]  = 'user_registerdate';
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_LEVEL)) {
            $modifiedColumns[':p' . $index++]  = 'user_level';
        }

        $sql = sprintf(
            'INSERT INTO user (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'user_id':                        
                        $stmt->bindValue($identifier, $this->user_id, PDO::PARAM_INT);
                        break;
                    case 'user_name':                        
                        $stmt->bindValue($identifier, $this->user_name, PDO::PARAM_STR);
                        break;
                    case 'user_email':                        
                        $stmt->bindValue($identifier, $this->user_email, PDO::PARAM_STR);
                        break;
                    case 'user_firstname':                        
                        $stmt->bindValue($identifier, $this->user_firstname, PDO::PARAM_STR);
                        break;
                    case 'user_lastname':                        
                        $stmt->bindValue($identifier, $this->user_lastname, PDO::PARAM_STR);
                        break;
                    case 'user_photo':                        
                        $stmt->bindValue($identifier, $this->user_photo, PDO::PARAM_STR);
                        break;
                    case 'user_password':                        
                        $stmt->bindValue($identifier, $this->user_password, PDO::PARAM_STR);
                        break;
                    case 'user_key':                        
                        $stmt->bindValue($identifier, $this->user_key, PDO::PARAM_STR);
                        break;
                    case 'user_status':                        
                        $stmt->bindValue($identifier, $this->user_status, PDO::PARAM_STR);
                        break;
                    case 'user_su':                        
                        $stmt->bindValue($identifier, $this->user_su, PDO::PARAM_STR);
                        break;
                    case 'user_expired':                        
                        $stmt->bindValue($identifier, $this->user_expired ? $this->user_expired->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'user_ipaddress':                        
                        $stmt->bindValue($identifier, $this->user_ipaddress, PDO::PARAM_STR);
                        break;
                    case 'user_registerdate':                        
                        $stmt->bindValue($identifier, $this->user_registerdate ? $this->user_registerdate->format("Y-m-d H:i:s.u") : null, PDO::PARAM_STR);
                        break;
                    case 'user_level':                        
                        $stmt->bindValue($identifier, $this->user_level, PDO::PARAM_STR);
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
        $pos = UserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
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
                return $this->getName();
                break;
            case 2:
                return $this->getEmail();
                break;
            case 3:
                return $this->getFirstName();
                break;
            case 4:
                return $this->getLastName();
                break;
            case 5:
                return $this->getPhoto();
                break;
            case 6:
                return $this->getPassword();
                break;
            case 7:
                return $this->getKey();
                break;
            case 8:
                return $this->getStatus();
                break;
            case 9:
                return $this->getSuperUser();
                break;
            case 10:
                return $this->getExpiredDate();
                break;
            case 11:
                return $this->getIPAddress();
                break;
            case 12:
                return $this->getRegisterDate();
                break;
            case 13:
                return $this->getLevel();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {

        if (isset($alreadyDumpedObjects['User'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['User'][$this->hashCode()] = true;
        $keys = UserTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getId(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getEmail(),
            $keys[3] => $this->getFirstName(),
            $keys[4] => $this->getLastName(),
            $keys[5] => $this->getPhoto(),
            $keys[6] => $this->getPassword(),
            $keys[7] => $this->getKey(),
            $keys[8] => $this->getStatus(),
            $keys[9] => $this->getSuperUser(),
            $keys[10] => $this->getExpiredDate(),
            $keys[11] => $this->getIPAddress(),
            $keys[12] => $this->getRegisterDate(),
            $keys[13] => $this->getLevel(),
        );
        if ($result[$keys[10]] instanceof \DateTime) {
            $result[$keys[10]] = $result[$keys[10]]->format('c');
        }
        
        if ($result[$keys[12]] instanceof \DateTime) {
            $result[$keys[12]] = $result[$keys[12]]->format('c');
        }
        
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
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
     * @return $this|\Propel\Table\AllNetwork\User
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = UserTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Propel\Table\AllNetwork\User
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setId($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setEmail($value);
                break;
            case 3:
                $this->setFirstName($value);
                break;
            case 4:
                $this->setLastName($value);
                break;
            case 5:
                $this->setPhoto($value);
                break;
            case 6:
                $this->setPassword($value);
                break;
            case 7:
                $this->setKey($value);
                break;
            case 8:
                $this->setStatus($value);
                break;
            case 9:
                $this->setSuperUser($value);
                break;
            case 10:
                $this->setExpiredDate($value);
                break;
            case 11:
                $this->setIPAddress($value);
                break;
            case 12:
                $this->setRegisterDate($value);
                break;
            case 13:
                $this->setLevel($value);
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
        $keys = UserTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setId($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setName($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setEmail($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setFirstName($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setLastName($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPhoto($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setPassword($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setKey($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setStatus($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setSuperUser($arr[$keys[9]]);
        }
        if (array_key_exists($keys[10], $arr)) {
            $this->setExpiredDate($arr[$keys[10]]);
        }
        if (array_key_exists($keys[11], $arr)) {
            $this->setIPAddress($arr[$keys[11]]);
        }
        if (array_key_exists($keys[12], $arr)) {
            $this->setRegisterDate($arr[$keys[12]]);
        }
        if (array_key_exists($keys[13], $arr)) {
            $this->setLevel($arr[$keys[13]]);
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
     * @return $this|\Propel\Table\AllNetwork\User The current object, for fluid interface
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
        $criteria = new Criteria(UserTableMap::DATABASE_NAME);

        if ($this->isColumnModified(UserTableMap::COL_USER_ID)) {
            $criteria->add(UserTableMap::COL_USER_ID, $this->user_id);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_NAME)) {
            $criteria->add(UserTableMap::COL_USER_NAME, $this->user_name);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_EMAIL)) {
            $criteria->add(UserTableMap::COL_USER_EMAIL, $this->user_email);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_FIRSTNAME)) {
            $criteria->add(UserTableMap::COL_USER_FIRSTNAME, $this->user_firstname);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_LASTNAME)) {
            $criteria->add(UserTableMap::COL_USER_LASTNAME, $this->user_lastname);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_PHOTO)) {
            $criteria->add(UserTableMap::COL_USER_PHOTO, $this->user_photo);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_PASSWORD)) {
            $criteria->add(UserTableMap::COL_USER_PASSWORD, $this->user_password);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_KEY)) {
            $criteria->add(UserTableMap::COL_USER_KEY, $this->user_key);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_STATUS)) {
            $criteria->add(UserTableMap::COL_USER_STATUS, $this->user_status);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_SU)) {
            $criteria->add(UserTableMap::COL_USER_SU, $this->user_su);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_EXPIRED)) {
            $criteria->add(UserTableMap::COL_USER_EXPIRED, $this->user_expired);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_IPADDRESS)) {
            $criteria->add(UserTableMap::COL_USER_IPADDRESS, $this->user_ipaddress);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_REGISTERDATE)) {
            $criteria->add(UserTableMap::COL_USER_REGISTERDATE, $this->user_registerdate);
        }
        if ($this->isColumnModified(UserTableMap::COL_USER_LEVEL)) {
            $criteria->add(UserTableMap::COL_USER_LEVEL, $this->user_level);
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
        $criteria = ChildUserQuery::create();
        $criteria->add(UserTableMap::COL_USER_ID, $this->user_id);

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
     * Generic method to set the primary key (user_id column).
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
     * @param      object $copyObj An object of \Propel\Table\AllNetwork\User (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setFirstName($this->getFirstName());
        $copyObj->setLastName($this->getLastName());
        $copyObj->setPhoto($this->getPhoto());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setKey($this->getKey());
        $copyObj->setStatus($this->getStatus());
        $copyObj->setSuperUser($this->getSuperUser());
        $copyObj->setExpiredDate($this->getExpiredDate());
        $copyObj->setIPAddress($this->getIPAddress());
        $copyObj->setRegisterDate($this->getRegisterDate());
        $copyObj->setLevel($this->getLevel());
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
     * @return \Propel\Table\AllNetwork\User Clone of current object.
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
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        $this->user_id = null;
        $this->user_name = null;
        $this->user_email = null;
        $this->user_firstname = null;
        $this->user_lastname = null;
        $this->user_photo = null;
        $this->user_password = null;
        $this->user_key = null;
        $this->user_status = null;
        $this->user_su = null;
        $this->user_expired = null;
        $this->user_ipaddress = null;
        $this->user_registerdate = null;
        $this->user_level = null;
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
        } // if ($deep)

    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UserTableMap::DEFAULT_STRING_FORMAT);
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

<?php


/**
 * Base class that represents a query for the 'photo_rate' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 05:18:52 2015
 *
 * @method PhotoRateQuery orderByPhotoId($order = Criteria::ASC) Order by the photo_id column
 * @method PhotoRateQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method PhotoRateQuery orderByRate($order = Criteria::ASC) Order by the rate column
 * @method PhotoRateQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method PhotoRateQuery orderByChecked($order = Criteria::ASC) Order by the checked column
 * @method PhotoRateQuery orderByDeleted($order = Criteria::ASC) Order by the deleted column
 *
 * @method PhotoRateQuery groupByPhotoId() Group by the photo_id column
 * @method PhotoRateQuery groupByUserId() Group by the user_id column
 * @method PhotoRateQuery groupByRate() Group by the rate column
 * @method PhotoRateQuery groupByCreatedAt() Group by the created_at column
 * @method PhotoRateQuery groupByChecked() Group by the checked column
 * @method PhotoRateQuery groupByDeleted() Group by the deleted column
 *
 * @method PhotoRateQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PhotoRateQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PhotoRateQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PhotoRateQuery leftJoinPhoto($relationAlias = null) Adds a LEFT JOIN clause to the query using the Photo relation
 * @method PhotoRateQuery rightJoinPhoto($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Photo relation
 * @method PhotoRateQuery innerJoinPhoto($relationAlias = null) Adds a INNER JOIN clause to the query using the Photo relation
 *
 * @method PhotoRateQuery leftJoinsfGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUser relation
 * @method PhotoRateQuery rightJoinsfGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUser relation
 * @method PhotoRateQuery innerJoinsfGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUser relation
 *
 * @method PhotoRate findOne(PropelPDO $con = null) Return the first PhotoRate matching the query
 * @method PhotoRate findOneOrCreate(PropelPDO $con = null) Return the first PhotoRate matching the query, or a new PhotoRate object populated from the query conditions when no match is found
 *
 * @method PhotoRate findOneByPhotoId(int $photo_id) Return the first PhotoRate filtered by the photo_id column
 * @method PhotoRate findOneByUserId(int $user_id) Return the first PhotoRate filtered by the user_id column
 * @method PhotoRate findOneByRate(int $rate) Return the first PhotoRate filtered by the rate column
 * @method PhotoRate findOneByCreatedAt(string $created_at) Return the first PhotoRate filtered by the created_at column
 * @method PhotoRate findOneByChecked(boolean $checked) Return the first PhotoRate filtered by the checked column
 * @method PhotoRate findOneByDeleted(boolean $deleted) Return the first PhotoRate filtered by the deleted column
 *
 * @method array findByPhotoId(int $photo_id) Return PhotoRate objects filtered by the photo_id column
 * @method array findByUserId(int $user_id) Return PhotoRate objects filtered by the user_id column
 * @method array findByRate(int $rate) Return PhotoRate objects filtered by the rate column
 * @method array findByCreatedAt(string $created_at) Return PhotoRate objects filtered by the created_at column
 * @method array findByChecked(boolean $checked) Return PhotoRate objects filtered by the checked column
 * @method array findByDeleted(boolean $deleted) Return PhotoRate objects filtered by the deleted column
 *
 * @package    propel.generator.plugins.sebekePlugin.lib.model.om
 */
abstract class BasePhotoRateQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePhotoRateQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'PhotoRate', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PhotoRateQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     PhotoRateQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PhotoRateQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PhotoRateQuery) {
            return $criteria;
        }
        $query = new PhotoRateQuery();
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
     * @param array $key Primary key to use for the query
                         A Primary key composition: [$photo_id, $user_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   PhotoRate|PhotoRate[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PhotoRatePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PhotoRatePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return   PhotoRate A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `PHOTO_ID`, `USER_ID`, `RATE`, `CREATED_AT`, `CHECKED`, `DELETED` FROM `photo_rate` WHERE `PHOTO_ID` = :p0 AND `USER_ID` = :p1';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new PhotoRate();
            $obj->hydrate($row);
            PhotoRatePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return PhotoRate|PhotoRate[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|PhotoRate[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PhotoRatePeer::PHOTO_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PhotoRatePeer::USER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PhotoRatePeer::PHOTO_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PhotoRatePeer::USER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the photo_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPhotoId(1234); // WHERE photo_id = 1234
     * $query->filterByPhotoId(array(12, 34)); // WHERE photo_id IN (12, 34)
     * $query->filterByPhotoId(array('min' => 12)); // WHERE photo_id > 12
     * </code>
     *
     * @see       filterByPhoto()
     *
     * @param     mixed $photoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function filterByPhotoId($photoId = null, $comparison = null)
    {
        if (is_array($photoId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(PhotoRatePeer::PHOTO_ID, $photoId, $comparison);
    }

    /**
     * Filter the query on the user_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUserId(1234); // WHERE user_id = 1234
     * $query->filterByUserId(array(12, 34)); // WHERE user_id IN (12, 34)
     * $query->filterByUserId(array('min' => 12)); // WHERE user_id > 12
     * </code>
     *
     * @see       filterBysfGuardUser()
     *
     * @param     mixed $userId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(PhotoRatePeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the rate column
     *
     * Example usage:
     * <code>
     * $query->filterByRate(1234); // WHERE rate = 1234
     * $query->filterByRate(array(12, 34)); // WHERE rate IN (12, 34)
     * $query->filterByRate(array('min' => 12)); // WHERE rate > 12
     * </code>
     *
     * @param     mixed $rate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function filterByRate($rate = null, $comparison = null)
    {
        if (is_array($rate)) {
            $useMinMax = false;
            if (isset($rate['min'])) {
                $this->addUsingAlias(PhotoRatePeer::RATE, $rate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rate['max'])) {
                $this->addUsingAlias(PhotoRatePeer::RATE, $rate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotoRatePeer::RATE, $rate, $comparison);
    }

    /**
     * Filter the query on the created_at column
     *
     * Example usage:
     * <code>
     * $query->filterByCreatedAt('2011-03-14'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt('now'); // WHERE created_at = '2011-03-14'
     * $query->filterByCreatedAt(array('max' => 'yesterday')); // WHERE created_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $createdAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(PhotoRatePeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(PhotoRatePeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PhotoRatePeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the checked column
     *
     * Example usage:
     * <code>
     * $query->filterByChecked(true); // WHERE checked = true
     * $query->filterByChecked('yes'); // WHERE checked = true
     * </code>
     *
     * @param     boolean|string $checked The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function filterByChecked($checked = null, $comparison = null)
    {
        if (is_string($checked)) {
            $checked = in_array(strtolower($checked), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PhotoRatePeer::CHECKED, $checked, $comparison);
    }

    /**
     * Filter the query on the deleted column
     *
     * Example usage:
     * <code>
     * $query->filterByDeleted(true); // WHERE deleted = true
     * $query->filterByDeleted('yes'); // WHERE deleted = true
     * </code>
     *
     * @param     boolean|string $deleted The value to use as filter.
     *              Non-boolean arguments are converted using the following rules:
     *                * 1, '1', 'true',  'on',  and 'yes' are converted to boolean true
     *                * 0, '0', 'false', 'off', and 'no'  are converted to boolean false
     *              Check on string values is case insensitive (so 'FaLsE' is seen as 'false').
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function filterByDeleted($deleted = null, $comparison = null)
    {
        if (is_string($deleted)) {
            $deleted = in_array(strtolower($deleted), array('false', 'off', '-', 'no', 'n', '0', '')) ? false : true;
        }

        return $this->addUsingAlias(PhotoRatePeer::DELETED, $deleted, $comparison);
    }

    /**
     * Filter the query by a related Photo object
     *
     * @param   Photo|PropelObjectCollection $photo The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PhotoRateQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPhoto($photo, $comparison = null)
    {
        if ($photo instanceof Photo) {
            return $this
                ->addUsingAlias(PhotoRatePeer::PHOTO_ID, $photo->getId(), $comparison);
        } elseif ($photo instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PhotoRatePeer::PHOTO_ID, $photo->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPhoto() only accepts arguments of type Photo or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Photo relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function joinPhoto($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Photo');

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
            $this->addJoinObject($join, 'Photo');
        }

        return $this;
    }

    /**
     * Use the Photo relation Photo object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PhotoQuery A secondary query class using the current class as primary query
     */
    public function usePhotoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPhoto($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Photo', 'PhotoQuery');
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PhotoRateQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUser($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(PhotoRatePeer::USER_ID, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PhotoRatePeer::USER_ID, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBysfGuardUser() only accepts arguments of type sfGuardUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfGuardUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function joinsfGuardUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfGuardUser');

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
            $this->addJoinObject($join, 'sfGuardUser');
        }

        return $this;
    }

    /**
     * Use the sfGuardUser relation sfGuardUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfGuardUserQuery A secondary query class using the current class as primary query
     */
    public function usesfGuardUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsfGuardUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfGuardUser', 'sfGuardUserQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PhotoRate $photoRate Object to remove from the list of results
     *
     * @return PhotoRateQuery The current query, for fluid interface
     */
    public function prune($photoRate = null)
    {
        if ($photoRate) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PhotoRatePeer::PHOTO_ID), $photoRate->getPhotoId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PhotoRatePeer::USER_ID), $photoRate->getUserId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}

<?php


/**
 * Base class that represents a query for the 'group_status' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 03:26:42 2015
 *
 * @method GroupStatusQuery orderById($order = Criteria::ASC) Order by the id column
 * @method GroupStatusQuery orderByGroupId($order = Criteria::ASC) Order by the group_id column
 * @method GroupStatusQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method GroupStatusQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method GroupStatusQuery groupById() Group by the id column
 * @method GroupStatusQuery groupByGroupId() Group by the group_id column
 * @method GroupStatusQuery groupByStatus() Group by the status column
 * @method GroupStatusQuery groupByCreatedAt() Group by the created_at column
 *
 * @method GroupStatusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method GroupStatusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method GroupStatusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method GroupStatusQuery leftJoinsfSocialGroup($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfSocialGroup relation
 * @method GroupStatusQuery rightJoinsfSocialGroup($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfSocialGroup relation
 * @method GroupStatusQuery innerJoinsfSocialGroup($relationAlias = null) Adds a INNER JOIN clause to the query using the sfSocialGroup relation
 *
 * @method GroupStatusQuery leftJoinGroupStatusComment($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupStatusComment relation
 * @method GroupStatusQuery rightJoinGroupStatusComment($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupStatusComment relation
 * @method GroupStatusQuery innerJoinGroupStatusComment($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupStatusComment relation
 *
 * @method GroupStatus findOne(PropelPDO $con = null) Return the first GroupStatus matching the query
 * @method GroupStatus findOneOrCreate(PropelPDO $con = null) Return the first GroupStatus matching the query, or a new GroupStatus object populated from the query conditions when no match is found
 *
 * @method GroupStatus findOneById(int $id) Return the first GroupStatus filtered by the id column
 * @method GroupStatus findOneByGroupId(int $group_id) Return the first GroupStatus filtered by the group_id column
 * @method GroupStatus findOneByStatus(string $status) Return the first GroupStatus filtered by the status column
 * @method GroupStatus findOneByCreatedAt(string $created_at) Return the first GroupStatus filtered by the created_at column
 *
 * @method array findById(int $id) Return GroupStatus objects filtered by the id column
 * @method array findByGroupId(int $group_id) Return GroupStatus objects filtered by the group_id column
 * @method array findByStatus(string $status) Return GroupStatus objects filtered by the status column
 * @method array findByCreatedAt(string $created_at) Return GroupStatus objects filtered by the created_at column
 *
 * @package    propel.generator.plugins.sfSocialPlugin.lib.model.om
 */
abstract class BaseGroupStatusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseGroupStatusQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'GroupStatus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GroupStatusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     GroupStatusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GroupStatusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GroupStatusQuery) {
            return $criteria;
        }
        $query = new GroupStatusQuery();
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
     * @param     PropelPDO $con an optional connection object
     *
     * @return   GroupStatus|GroupStatus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GroupStatusPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupStatusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   GroupStatus A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `GROUP_ID`, `STATUS`, `CREATED_AT` FROM `group_status` WHERE `ID` = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new GroupStatus();
            $obj->hydrate($row);
            GroupStatusPeer::addInstanceToPool($obj, (string) $key);
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
     * @return GroupStatus|GroupStatus[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|GroupStatus[]|mixed the list of results, formatted by the current formatter
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
     * @return GroupStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GroupStatusPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GroupStatusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GroupStatusPeer::ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id column
     *
     * Example usage:
     * <code>
     * $query->filterById(1234); // WHERE id = 1234
     * $query->filterById(array(12, 34)); // WHERE id IN (12, 34)
     * $query->filterById(array('min' => 12)); // WHERE id > 12
     * </code>
     *
     * @param     mixed $id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupStatusQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(GroupStatusPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the group_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupId(1234); // WHERE group_id = 1234
     * $query->filterByGroupId(array(12, 34)); // WHERE group_id IN (12, 34)
     * $query->filterByGroupId(array('min' => 12)); // WHERE group_id > 12
     * </code>
     *
     * @see       filterBysfSocialGroup()
     *
     * @param     mixed $groupId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupStatusQuery The current query, for fluid interface
     */
    public function filterByGroupId($groupId = null, $comparison = null)
    {
        if (is_array($groupId)) {
            $useMinMax = false;
            if (isset($groupId['min'])) {
                $this->addUsingAlias(GroupStatusPeer::GROUP_ID, $groupId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupId['max'])) {
                $this->addUsingAlias(GroupStatusPeer::GROUP_ID, $groupId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupStatusPeer::GROUP_ID, $groupId, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus('fooValue');   // WHERE status = 'fooValue'
     * $query->filterByStatus('%fooValue%'); // WHERE status LIKE '%fooValue%'
     * </code>
     *
     * @param     string $status The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupStatusQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($status)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $status)) {
                $status = str_replace('*', '%', $status);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GroupStatusPeer::STATUS, $status, $comparison);
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
     * @return GroupStatusQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(GroupStatusPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(GroupStatusPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupStatusPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related sfSocialGroup object
     *
     * @param   sfSocialGroup|PropelObjectCollection $sfSocialGroup The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   GroupStatusQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfSocialGroup($sfSocialGroup, $comparison = null)
    {
        if ($sfSocialGroup instanceof sfSocialGroup) {
            return $this
                ->addUsingAlias(GroupStatusPeer::GROUP_ID, $sfSocialGroup->getId(), $comparison);
        } elseif ($sfSocialGroup instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GroupStatusPeer::GROUP_ID, $sfSocialGroup->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterBysfSocialGroup() only accepts arguments of type sfSocialGroup or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfSocialGroup relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GroupStatusQuery The current query, for fluid interface
     */
    public function joinsfSocialGroup($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfSocialGroup');

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
            $this->addJoinObject($join, 'sfSocialGroup');
        }

        return $this;
    }

    /**
     * Use the sfSocialGroup relation sfSocialGroup object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfSocialGroupQuery A secondary query class using the current class as primary query
     */
    public function usesfSocialGroupQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsfSocialGroup($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfSocialGroup', 'sfSocialGroupQuery');
    }

    /**
     * Filter the query by a related GroupStatusComment object
     *
     * @param   GroupStatusComment|PropelObjectCollection $groupStatusComment  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   GroupStatusQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByGroupStatusComment($groupStatusComment, $comparison = null)
    {
        if ($groupStatusComment instanceof GroupStatusComment) {
            return $this
                ->addUsingAlias(GroupStatusPeer::ID, $groupStatusComment->getGroupStatusId(), $comparison);
        } elseif ($groupStatusComment instanceof PropelObjectCollection) {
            return $this
                ->useGroupStatusCommentQuery()
                ->filterByPrimaryKeys($groupStatusComment->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGroupStatusComment() only accepts arguments of type GroupStatusComment or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GroupStatusComment relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GroupStatusQuery The current query, for fluid interface
     */
    public function joinGroupStatusComment($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GroupStatusComment');

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
            $this->addJoinObject($join, 'GroupStatusComment');
        }

        return $this;
    }

    /**
     * Use the GroupStatusComment relation GroupStatusComment object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   GroupStatusCommentQuery A secondary query class using the current class as primary query
     */
    public function useGroupStatusCommentQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGroupStatusComment($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GroupStatusComment', 'GroupStatusCommentQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   GroupStatus $groupStatus Object to remove from the list of results
     *
     * @return GroupStatusQuery The current query, for fluid interface
     */
    public function prune($groupStatus = null)
    {
        if ($groupStatus) {
            $this->addUsingAlias(GroupStatusPeer::ID, $groupStatus->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

<?php


/**
 * Base class that represents a query for the 'group_status_comment' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 05:18:55 2015
 *
 * @method GroupStatusCommentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method GroupStatusCommentQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method GroupStatusCommentQuery orderByGroupStatusId($order = Criteria::ASC) Order by the group_status_id column
 * @method GroupStatusCommentQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method GroupStatusCommentQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method GroupStatusCommentQuery groupById() Group by the id column
 * @method GroupStatusCommentQuery groupByUserId() Group by the user_id column
 * @method GroupStatusCommentQuery groupByGroupStatusId() Group by the group_status_id column
 * @method GroupStatusCommentQuery groupByComment() Group by the comment column
 * @method GroupStatusCommentQuery groupByCreatedAt() Group by the created_at column
 *
 * @method GroupStatusCommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method GroupStatusCommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method GroupStatusCommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method GroupStatusCommentQuery leftJoinsfGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUser relation
 * @method GroupStatusCommentQuery rightJoinsfGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUser relation
 * @method GroupStatusCommentQuery innerJoinsfGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUser relation
 *
 * @method GroupStatusCommentQuery leftJoinGroupStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupStatus relation
 * @method GroupStatusCommentQuery rightJoinGroupStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupStatus relation
 * @method GroupStatusCommentQuery innerJoinGroupStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupStatus relation
 *
 * @method GroupStatusComment findOne(PropelPDO $con = null) Return the first GroupStatusComment matching the query
 * @method GroupStatusComment findOneOrCreate(PropelPDO $con = null) Return the first GroupStatusComment matching the query, or a new GroupStatusComment object populated from the query conditions when no match is found
 *
 * @method GroupStatusComment findOneById(int $id) Return the first GroupStatusComment filtered by the id column
 * @method GroupStatusComment findOneByUserId(int $user_id) Return the first GroupStatusComment filtered by the user_id column
 * @method GroupStatusComment findOneByGroupStatusId(int $group_status_id) Return the first GroupStatusComment filtered by the group_status_id column
 * @method GroupStatusComment findOneByComment(string $comment) Return the first GroupStatusComment filtered by the comment column
 * @method GroupStatusComment findOneByCreatedAt(string $created_at) Return the first GroupStatusComment filtered by the created_at column
 *
 * @method array findById(int $id) Return GroupStatusComment objects filtered by the id column
 * @method array findByUserId(int $user_id) Return GroupStatusComment objects filtered by the user_id column
 * @method array findByGroupStatusId(int $group_status_id) Return GroupStatusComment objects filtered by the group_status_id column
 * @method array findByComment(string $comment) Return GroupStatusComment objects filtered by the comment column
 * @method array findByCreatedAt(string $created_at) Return GroupStatusComment objects filtered by the created_at column
 *
 * @package    propel.generator.plugins.sfSocialPlugin.lib.model.om
 */
abstract class BaseGroupStatusCommentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseGroupStatusCommentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'GroupStatusComment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GroupStatusCommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     GroupStatusCommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GroupStatusCommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GroupStatusCommentQuery) {
            return $criteria;
        }
        $query = new GroupStatusCommentQuery();
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
     * @return   GroupStatusComment|GroupStatusComment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GroupStatusCommentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GroupStatusCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   GroupStatusComment A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USER_ID`, `GROUP_STATUS_ID`, `COMMENT`, `CREATED_AT` FROM `group_status_comment` WHERE `ID` = :p0';
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
            $obj = new GroupStatusComment();
            $obj->hydrate($row);
            GroupStatusCommentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return GroupStatusComment|GroupStatusComment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|GroupStatusComment[]|mixed the list of results, formatted by the current formatter
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
     * @return GroupStatusCommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GroupStatusCommentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GroupStatusCommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GroupStatusCommentPeer::ID, $keys, Criteria::IN);
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
     * @return GroupStatusCommentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(GroupStatusCommentPeer::ID, $id, $comparison);
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
     * @return GroupStatusCommentQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(GroupStatusCommentPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(GroupStatusCommentPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupStatusCommentPeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the group_status_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGroupStatusId(1234); // WHERE group_status_id = 1234
     * $query->filterByGroupStatusId(array(12, 34)); // WHERE group_status_id IN (12, 34)
     * $query->filterByGroupStatusId(array('min' => 12)); // WHERE group_status_id > 12
     * </code>
     *
     * @see       filterByGroupStatus()
     *
     * @param     mixed $groupStatusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupStatusCommentQuery The current query, for fluid interface
     */
    public function filterByGroupStatusId($groupStatusId = null, $comparison = null)
    {
        if (is_array($groupStatusId)) {
            $useMinMax = false;
            if (isset($groupStatusId['min'])) {
                $this->addUsingAlias(GroupStatusCommentPeer::GROUP_STATUS_ID, $groupStatusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($groupStatusId['max'])) {
                $this->addUsingAlias(GroupStatusCommentPeer::GROUP_STATUS_ID, $groupStatusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupStatusCommentPeer::GROUP_STATUS_ID, $groupStatusId, $comparison);
    }

    /**
     * Filter the query on the comment column
     *
     * Example usage:
     * <code>
     * $query->filterByComment('fooValue');   // WHERE comment = 'fooValue'
     * $query->filterByComment('%fooValue%'); // WHERE comment LIKE '%fooValue%'
     * </code>
     *
     * @param     string $comment The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GroupStatusCommentQuery The current query, for fluid interface
     */
    public function filterByComment($comment = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($comment)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $comment)) {
                $comment = str_replace('*', '%', $comment);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GroupStatusCommentPeer::COMMENT, $comment, $comparison);
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
     * @return GroupStatusCommentQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(GroupStatusCommentPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(GroupStatusCommentPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GroupStatusCommentPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   GroupStatusCommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUser($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(GroupStatusCommentPeer::USER_ID, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GroupStatusCommentPeer::USER_ID, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return GroupStatusCommentQuery The current query, for fluid interface
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
     * Filter the query by a related GroupStatus object
     *
     * @param   GroupStatus|PropelObjectCollection $groupStatus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   GroupStatusCommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByGroupStatus($groupStatus, $comparison = null)
    {
        if ($groupStatus instanceof GroupStatus) {
            return $this
                ->addUsingAlias(GroupStatusCommentPeer::GROUP_STATUS_ID, $groupStatus->getId(), $comparison);
        } elseif ($groupStatus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GroupStatusCommentPeer::GROUP_STATUS_ID, $groupStatus->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByGroupStatus() only accepts arguments of type GroupStatus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GroupStatus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GroupStatusCommentQuery The current query, for fluid interface
     */
    public function joinGroupStatus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GroupStatus');

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
            $this->addJoinObject($join, 'GroupStatus');
        }

        return $this;
    }

    /**
     * Use the GroupStatus relation GroupStatus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   GroupStatusQuery A secondary query class using the current class as primary query
     */
    public function useGroupStatusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGroupStatus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GroupStatus', 'GroupStatusQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   GroupStatusComment $groupStatusComment Object to remove from the list of results
     *
     * @return GroupStatusCommentQuery The current query, for fluid interface
     */
    public function prune($groupStatusComment = null)
    {
        if ($groupStatusComment) {
            $this->addUsingAlias(GroupStatusCommentPeer::ID, $groupStatusComment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
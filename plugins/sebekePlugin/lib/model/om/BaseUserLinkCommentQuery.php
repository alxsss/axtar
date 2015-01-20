<?php


/**
 * Base class that represents a query for the 'user_link_comment' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 05:18:53 2015
 *
 * @method UserLinkCommentQuery orderById($order = Criteria::ASC) Order by the id column
 * @method UserLinkCommentQuery orderByUserId($order = Criteria::ASC) Order by the user_id column
 * @method UserLinkCommentQuery orderByLinkId($order = Criteria::ASC) Order by the link_id column
 * @method UserLinkCommentQuery orderByComment($order = Criteria::ASC) Order by the comment column
 * @method UserLinkCommentQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 *
 * @method UserLinkCommentQuery groupById() Group by the id column
 * @method UserLinkCommentQuery groupByUserId() Group by the user_id column
 * @method UserLinkCommentQuery groupByLinkId() Group by the link_id column
 * @method UserLinkCommentQuery groupByComment() Group by the comment column
 * @method UserLinkCommentQuery groupByCreatedAt() Group by the created_at column
 *
 * @method UserLinkCommentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UserLinkCommentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UserLinkCommentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UserLinkCommentQuery leftJoinsfGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUser relation
 * @method UserLinkCommentQuery rightJoinsfGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUser relation
 * @method UserLinkCommentQuery innerJoinsfGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUser relation
 *
 * @method UserLinkCommentQuery leftJoinUserLink($relationAlias = null) Adds a LEFT JOIN clause to the query using the UserLink relation
 * @method UserLinkCommentQuery rightJoinUserLink($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UserLink relation
 * @method UserLinkCommentQuery innerJoinUserLink($relationAlias = null) Adds a INNER JOIN clause to the query using the UserLink relation
 *
 * @method UserLinkComment findOne(PropelPDO $con = null) Return the first UserLinkComment matching the query
 * @method UserLinkComment findOneOrCreate(PropelPDO $con = null) Return the first UserLinkComment matching the query, or a new UserLinkComment object populated from the query conditions when no match is found
 *
 * @method UserLinkComment findOneById(int $id) Return the first UserLinkComment filtered by the id column
 * @method UserLinkComment findOneByUserId(int $user_id) Return the first UserLinkComment filtered by the user_id column
 * @method UserLinkComment findOneByLinkId(int $link_id) Return the first UserLinkComment filtered by the link_id column
 * @method UserLinkComment findOneByComment(string $comment) Return the first UserLinkComment filtered by the comment column
 * @method UserLinkComment findOneByCreatedAt(string $created_at) Return the first UserLinkComment filtered by the created_at column
 *
 * @method array findById(int $id) Return UserLinkComment objects filtered by the id column
 * @method array findByUserId(int $user_id) Return UserLinkComment objects filtered by the user_id column
 * @method array findByLinkId(int $link_id) Return UserLinkComment objects filtered by the link_id column
 * @method array findByComment(string $comment) Return UserLinkComment objects filtered by the comment column
 * @method array findByCreatedAt(string $created_at) Return UserLinkComment objects filtered by the created_at column
 *
 * @package    propel.generator.plugins.sebekePlugin.lib.model.om
 */
abstract class BaseUserLinkCommentQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUserLinkCommentQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'UserLinkComment', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UserLinkCommentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     UserLinkCommentQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UserLinkCommentQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UserLinkCommentQuery) {
            return $criteria;
        }
        $query = new UserLinkCommentQuery();
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
     * @return   UserLinkComment|UserLinkComment[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UserLinkCommentPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UserLinkCommentPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   UserLinkComment A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USER_ID`, `LINK_ID`, `COMMENT`, `CREATED_AT` FROM `user_link_comment` WHERE `ID` = :p0';
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
            $obj = new UserLinkComment();
            $obj->hydrate($row);
            UserLinkCommentPeer::addInstanceToPool($obj, (string) $key);
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
     * @return UserLinkComment|UserLinkComment[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UserLinkComment[]|mixed the list of results, formatted by the current formatter
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
     * @return UserLinkCommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UserLinkCommentPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UserLinkCommentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UserLinkCommentPeer::ID, $keys, Criteria::IN);
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
     * @return UserLinkCommentQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(UserLinkCommentPeer::ID, $id, $comparison);
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
     * @return UserLinkCommentQuery The current query, for fluid interface
     */
    public function filterByUserId($userId = null, $comparison = null)
    {
        if (is_array($userId)) {
            $useMinMax = false;
            if (isset($userId['min'])) {
                $this->addUsingAlias(UserLinkCommentPeer::USER_ID, $userId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userId['max'])) {
                $this->addUsingAlias(UserLinkCommentPeer::USER_ID, $userId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserLinkCommentPeer::USER_ID, $userId, $comparison);
    }

    /**
     * Filter the query on the link_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLinkId(1234); // WHERE link_id = 1234
     * $query->filterByLinkId(array(12, 34)); // WHERE link_id IN (12, 34)
     * $query->filterByLinkId(array('min' => 12)); // WHERE link_id > 12
     * </code>
     *
     * @see       filterByUserLink()
     *
     * @param     mixed $linkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UserLinkCommentQuery The current query, for fluid interface
     */
    public function filterByLinkId($linkId = null, $comparison = null)
    {
        if (is_array($linkId)) {
            $useMinMax = false;
            if (isset($linkId['min'])) {
                $this->addUsingAlias(UserLinkCommentPeer::LINK_ID, $linkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($linkId['max'])) {
                $this->addUsingAlias(UserLinkCommentPeer::LINK_ID, $linkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserLinkCommentPeer::LINK_ID, $linkId, $comparison);
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
     * @return UserLinkCommentQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UserLinkCommentPeer::COMMENT, $comment, $comparison);
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
     * @return UserLinkCommentQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(UserLinkCommentPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(UserLinkCommentPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UserLinkCommentPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserLinkCommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUser($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(UserLinkCommentPeer::USER_ID, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UserLinkCommentPeer::USER_ID, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return UserLinkCommentQuery The current query, for fluid interface
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
     * Filter the query by a related UserLink object
     *
     * @param   UserLink|PropelObjectCollection $userLink The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   UserLinkCommentQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByUserLink($userLink, $comparison = null)
    {
        if ($userLink instanceof UserLink) {
            return $this
                ->addUsingAlias(UserLinkCommentPeer::LINK_ID, $userLink->getId(), $comparison);
        } elseif ($userLink instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UserLinkCommentPeer::LINK_ID, $userLink->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByUserLink() only accepts arguments of type UserLink or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UserLink relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UserLinkCommentQuery The current query, for fluid interface
     */
    public function joinUserLink($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UserLink');

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
            $this->addJoinObject($join, 'UserLink');
        }

        return $this;
    }

    /**
     * Use the UserLink relation UserLink object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   UserLinkQuery A secondary query class using the current class as primary query
     */
    public function useUserLinkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUserLink($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UserLink', 'UserLinkQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   UserLinkComment $userLinkComment Object to remove from the list of results
     *
     * @return UserLinkCommentQuery The current query, for fluid interface
     */
    public function prune($userLinkComment = null)
    {
        if ($userLinkComment) {
            $this->addUsingAlias(UserLinkCommentPeer::ID, $userLinkComment->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

<?php


/**
 * Base class that represents a query for the 'sf_social_group' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 03:26:42 2015
 *
 * @method sfSocialGroupQuery orderById($order = Criteria::ASC) Order by the id column
 * @method sfSocialGroupQuery orderByUserAdmin($order = Criteria::ASC) Order by the user_admin column
 * @method sfSocialGroupQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method sfSocialGroupQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method sfSocialGroupQuery orderByVisibility($order = Criteria::ASC) Order by the visibility column
 * @method sfSocialGroupQuery orderByPhoto($order = Criteria::ASC) Order by the photo column
 * @method sfSocialGroupQuery orderByCreatedAt($order = Criteria::ASC) Order by the created_at column
 * @method sfSocialGroupQuery orderByUpdatedAt($order = Criteria::ASC) Order by the updated_at column
 *
 * @method sfSocialGroupQuery groupById() Group by the id column
 * @method sfSocialGroupQuery groupByUserAdmin() Group by the user_admin column
 * @method sfSocialGroupQuery groupByTitle() Group by the title column
 * @method sfSocialGroupQuery groupByDescription() Group by the description column
 * @method sfSocialGroupQuery groupByVisibility() Group by the visibility column
 * @method sfSocialGroupQuery groupByPhoto() Group by the photo column
 * @method sfSocialGroupQuery groupByCreatedAt() Group by the created_at column
 * @method sfSocialGroupQuery groupByUpdatedAt() Group by the updated_at column
 *
 * @method sfSocialGroupQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method sfSocialGroupQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method sfSocialGroupQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method sfSocialGroupQuery leftJoinsfGuardUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfGuardUser relation
 * @method sfSocialGroupQuery rightJoinsfGuardUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfGuardUser relation
 * @method sfSocialGroupQuery innerJoinsfGuardUser($relationAlias = null) Adds a INNER JOIN clause to the query using the sfGuardUser relation
 *
 * @method sfSocialGroupQuery leftJoinsfSocialGroupInvite($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfSocialGroupInvite relation
 * @method sfSocialGroupQuery rightJoinsfSocialGroupInvite($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfSocialGroupInvite relation
 * @method sfSocialGroupQuery innerJoinsfSocialGroupInvite($relationAlias = null) Adds a INNER JOIN clause to the query using the sfSocialGroupInvite relation
 *
 * @method sfSocialGroupQuery leftJoinsfSocialGroupUser($relationAlias = null) Adds a LEFT JOIN clause to the query using the sfSocialGroupUser relation
 * @method sfSocialGroupQuery rightJoinsfSocialGroupUser($relationAlias = null) Adds a RIGHT JOIN clause to the query using the sfSocialGroupUser relation
 * @method sfSocialGroupQuery innerJoinsfSocialGroupUser($relationAlias = null) Adds a INNER JOIN clause to the query using the sfSocialGroupUser relation
 *
 * @method sfSocialGroupQuery leftJoinGroupStatus($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupStatus relation
 * @method sfSocialGroupQuery rightJoinGroupStatus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupStatus relation
 * @method sfSocialGroupQuery innerJoinGroupStatus($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupStatus relation
 *
 * @method sfSocialGroup findOne(PropelPDO $con = null) Return the first sfSocialGroup matching the query
 * @method sfSocialGroup findOneOrCreate(PropelPDO $con = null) Return the first sfSocialGroup matching the query, or a new sfSocialGroup object populated from the query conditions when no match is found
 *
 * @method sfSocialGroup findOneById(int $id) Return the first sfSocialGroup filtered by the id column
 * @method sfSocialGroup findOneByUserAdmin(int $user_admin) Return the first sfSocialGroup filtered by the user_admin column
 * @method sfSocialGroup findOneByTitle(string $title) Return the first sfSocialGroup filtered by the title column
 * @method sfSocialGroup findOneByDescription(string $description) Return the first sfSocialGroup filtered by the description column
 * @method sfSocialGroup findOneByVisibility(int $visibility) Return the first sfSocialGroup filtered by the visibility column
 * @method sfSocialGroup findOneByPhoto(string $photo) Return the first sfSocialGroup filtered by the photo column
 * @method sfSocialGroup findOneByCreatedAt(string $created_at) Return the first sfSocialGroup filtered by the created_at column
 * @method sfSocialGroup findOneByUpdatedAt(string $updated_at) Return the first sfSocialGroup filtered by the updated_at column
 *
 * @method array findById(int $id) Return sfSocialGroup objects filtered by the id column
 * @method array findByUserAdmin(int $user_admin) Return sfSocialGroup objects filtered by the user_admin column
 * @method array findByTitle(string $title) Return sfSocialGroup objects filtered by the title column
 * @method array findByDescription(string $description) Return sfSocialGroup objects filtered by the description column
 * @method array findByVisibility(int $visibility) Return sfSocialGroup objects filtered by the visibility column
 * @method array findByPhoto(string $photo) Return sfSocialGroup objects filtered by the photo column
 * @method array findByCreatedAt(string $created_at) Return sfSocialGroup objects filtered by the created_at column
 * @method array findByUpdatedAt(string $updated_at) Return sfSocialGroup objects filtered by the updated_at column
 *
 * @package    propel.generator.plugins.sfSocialPlugin.lib.model.om
 */
abstract class BasesfSocialGroupQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasesfSocialGroupQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'sfSocialGroup', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new sfSocialGroupQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     sfSocialGroupQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return sfSocialGroupQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof sfSocialGroupQuery) {
            return $criteria;
        }
        $query = new sfSocialGroupQuery();
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
     * @return   sfSocialGroup|sfSocialGroup[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = sfSocialGroupPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(sfSocialGroupPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   sfSocialGroup A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `ID`, `USER_ADMIN`, `TITLE`, `DESCRIPTION`, `VISIBILITY`, `PHOTO`, `CREATED_AT`, `UPDATED_AT` FROM `sf_social_group` WHERE `ID` = :p0';
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
            $obj = new sfSocialGroup();
            $obj->hydrate($row);
            sfSocialGroupPeer::addInstanceToPool($obj, (string) $key);
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
     * @return sfSocialGroup|sfSocialGroup[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|sfSocialGroup[]|mixed the list of results, formatted by the current formatter
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
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(sfSocialGroupPeer::ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(sfSocialGroupPeer::ID, $keys, Criteria::IN);
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
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterById($id = null, $comparison = null)
    {
        if (is_array($id) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(sfSocialGroupPeer::ID, $id, $comparison);
    }

    /**
     * Filter the query on the user_admin column
     *
     * Example usage:
     * <code>
     * $query->filterByUserAdmin(1234); // WHERE user_admin = 1234
     * $query->filterByUserAdmin(array(12, 34)); // WHERE user_admin IN (12, 34)
     * $query->filterByUserAdmin(array('min' => 12)); // WHERE user_admin > 12
     * </code>
     *
     * @see       filterBysfGuardUser()
     *
     * @param     mixed $userAdmin The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterByUserAdmin($userAdmin = null, $comparison = null)
    {
        if (is_array($userAdmin)) {
            $useMinMax = false;
            if (isset($userAdmin['min'])) {
                $this->addUsingAlias(sfSocialGroupPeer::USER_ADMIN, $userAdmin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($userAdmin['max'])) {
                $this->addUsingAlias(sfSocialGroupPeer::USER_ADMIN, $userAdmin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfSocialGroupPeer::USER_ADMIN, $userAdmin, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%'); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $title)) {
                $title = str_replace('*', '%', $title);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(sfSocialGroupPeer::TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%'); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $description)) {
                $description = str_replace('*', '%', $description);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(sfSocialGroupPeer::DESCRIPTION, $description, $comparison);
    }

    /**
     * Filter the query on the visibility column
     *
     * Example usage:
     * <code>
     * $query->filterByVisibility(1234); // WHERE visibility = 1234
     * $query->filterByVisibility(array(12, 34)); // WHERE visibility IN (12, 34)
     * $query->filterByVisibility(array('min' => 12)); // WHERE visibility > 12
     * </code>
     *
     * @param     mixed $visibility The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterByVisibility($visibility = null, $comparison = null)
    {
        if (is_array($visibility)) {
            $useMinMax = false;
            if (isset($visibility['min'])) {
                $this->addUsingAlias(sfSocialGroupPeer::VISIBILITY, $visibility['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($visibility['max'])) {
                $this->addUsingAlias(sfSocialGroupPeer::VISIBILITY, $visibility['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfSocialGroupPeer::VISIBILITY, $visibility, $comparison);
    }

    /**
     * Filter the query on the photo column
     *
     * Example usage:
     * <code>
     * $query->filterByPhoto('fooValue');   // WHERE photo = 'fooValue'
     * $query->filterByPhoto('%fooValue%'); // WHERE photo LIKE '%fooValue%'
     * </code>
     *
     * @param     string $photo The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterByPhoto($photo = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($photo)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $photo)) {
                $photo = str_replace('*', '%', $photo);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(sfSocialGroupPeer::PHOTO, $photo, $comparison);
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
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterByCreatedAt($createdAt = null, $comparison = null)
    {
        if (is_array($createdAt)) {
            $useMinMax = false;
            if (isset($createdAt['min'])) {
                $this->addUsingAlias(sfSocialGroupPeer::CREATED_AT, $createdAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createdAt['max'])) {
                $this->addUsingAlias(sfSocialGroupPeer::CREATED_AT, $createdAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfSocialGroupPeer::CREATED_AT, $createdAt, $comparison);
    }

    /**
     * Filter the query on the updated_at column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdatedAt('2011-03-14'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt('now'); // WHERE updated_at = '2011-03-14'
     * $query->filterByUpdatedAt(array('max' => 'yesterday')); // WHERE updated_at > '2011-03-13'
     * </code>
     *
     * @param     mixed $updatedAt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function filterByUpdatedAt($updatedAt = null, $comparison = null)
    {
        if (is_array($updatedAt)) {
            $useMinMax = false;
            if (isset($updatedAt['min'])) {
                $this->addUsingAlias(sfSocialGroupPeer::UPDATED_AT, $updatedAt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($updatedAt['max'])) {
                $this->addUsingAlias(sfSocialGroupPeer::UPDATED_AT, $updatedAt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(sfSocialGroupPeer::UPDATED_AT, $updatedAt, $comparison);
    }

    /**
     * Filter the query by a related sfGuardUser object
     *
     * @param   sfGuardUser|PropelObjectCollection $sfGuardUser The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfSocialGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfGuardUser($sfGuardUser, $comparison = null)
    {
        if ($sfGuardUser instanceof sfGuardUser) {
            return $this
                ->addUsingAlias(sfSocialGroupPeer::USER_ADMIN, $sfGuardUser->getId(), $comparison);
        } elseif ($sfGuardUser instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(sfSocialGroupPeer::USER_ADMIN, $sfGuardUser->toKeyValue('PrimaryKey', 'Id'), $comparison);
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
     * @return sfSocialGroupQuery The current query, for fluid interface
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
     * Filter the query by a related sfSocialGroupInvite object
     *
     * @param   sfSocialGroupInvite|PropelObjectCollection $sfSocialGroupInvite  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfSocialGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfSocialGroupInvite($sfSocialGroupInvite, $comparison = null)
    {
        if ($sfSocialGroupInvite instanceof sfSocialGroupInvite) {
            return $this
                ->addUsingAlias(sfSocialGroupPeer::ID, $sfSocialGroupInvite->getGroupId(), $comparison);
        } elseif ($sfSocialGroupInvite instanceof PropelObjectCollection) {
            return $this
                ->usesfSocialGroupInviteQuery()
                ->filterByPrimaryKeys($sfSocialGroupInvite->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysfSocialGroupInvite() only accepts arguments of type sfSocialGroupInvite or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfSocialGroupInvite relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function joinsfSocialGroupInvite($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfSocialGroupInvite');

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
            $this->addJoinObject($join, 'sfSocialGroupInvite');
        }

        return $this;
    }

    /**
     * Use the sfSocialGroupInvite relation sfSocialGroupInvite object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfSocialGroupInviteQuery A secondary query class using the current class as primary query
     */
    public function usesfSocialGroupInviteQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsfSocialGroupInvite($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfSocialGroupInvite', 'sfSocialGroupInviteQuery');
    }

    /**
     * Filter the query by a related sfSocialGroupUser object
     *
     * @param   sfSocialGroupUser|PropelObjectCollection $sfSocialGroupUser  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfSocialGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterBysfSocialGroupUser($sfSocialGroupUser, $comparison = null)
    {
        if ($sfSocialGroupUser instanceof sfSocialGroupUser) {
            return $this
                ->addUsingAlias(sfSocialGroupPeer::ID, $sfSocialGroupUser->getGroupId(), $comparison);
        } elseif ($sfSocialGroupUser instanceof PropelObjectCollection) {
            return $this
                ->usesfSocialGroupUserQuery()
                ->filterByPrimaryKeys($sfSocialGroupUser->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBysfSocialGroupUser() only accepts arguments of type sfSocialGroupUser or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the sfSocialGroupUser relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function joinsfSocialGroupUser($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('sfSocialGroupUser');

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
            $this->addJoinObject($join, 'sfSocialGroupUser');
        }

        return $this;
    }

    /**
     * Use the sfSocialGroupUser relation sfSocialGroupUser object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   sfSocialGroupUserQuery A secondary query class using the current class as primary query
     */
    public function usesfSocialGroupUserQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinsfSocialGroupUser($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'sfSocialGroupUser', 'sfSocialGroupUserQuery');
    }

    /**
     * Filter the query by a related GroupStatus object
     *
     * @param   GroupStatus|PropelObjectCollection $groupStatus  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   sfSocialGroupQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByGroupStatus($groupStatus, $comparison = null)
    {
        if ($groupStatus instanceof GroupStatus) {
            return $this
                ->addUsingAlias(sfSocialGroupPeer::ID, $groupStatus->getGroupId(), $comparison);
        } elseif ($groupStatus instanceof PropelObjectCollection) {
            return $this
                ->useGroupStatusQuery()
                ->filterByPrimaryKeys($groupStatus->getPrimaryKeys())
                ->endUse();
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
     * @return sfSocialGroupQuery The current query, for fluid interface
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
     * @param   sfSocialGroup $sfSocialGroup Object to remove from the list of results
     *
     * @return sfSocialGroupQuery The current query, for fluid interface
     */
    public function prune($sfSocialGroup = null)
    {
        if ($sfSocialGroup) {
            $this->addUsingAlias(sfSocialGroupPeer::ID, $sfSocialGroup->getId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}

<?php


/**
 * Base class that represents a query for the 'playlist_music' table.
 *
 *
 *
 * This class was autogenerated by Propel 1.6.7 on:
 *
 * Fri Jan  9 05:18:53 2015
 *
 * @method PlaylistMusicQuery orderByPlaylistId($order = Criteria::ASC) Order by the playlist_id column
 * @method PlaylistMusicQuery orderByMusicId($order = Criteria::ASC) Order by the music_id column
 *
 * @method PlaylistMusicQuery groupByPlaylistId() Group by the playlist_id column
 * @method PlaylistMusicQuery groupByMusicId() Group by the music_id column
 *
 * @method PlaylistMusicQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PlaylistMusicQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PlaylistMusicQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PlaylistMusicQuery leftJoinPlaylist($relationAlias = null) Adds a LEFT JOIN clause to the query using the Playlist relation
 * @method PlaylistMusicQuery rightJoinPlaylist($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Playlist relation
 * @method PlaylistMusicQuery innerJoinPlaylist($relationAlias = null) Adds a INNER JOIN clause to the query using the Playlist relation
 *
 * @method PlaylistMusicQuery leftJoinMusic($relationAlias = null) Adds a LEFT JOIN clause to the query using the Music relation
 * @method PlaylistMusicQuery rightJoinMusic($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Music relation
 * @method PlaylistMusicQuery innerJoinMusic($relationAlias = null) Adds a INNER JOIN clause to the query using the Music relation
 *
 * @method PlaylistMusic findOne(PropelPDO $con = null) Return the first PlaylistMusic matching the query
 * @method PlaylistMusic findOneOrCreate(PropelPDO $con = null) Return the first PlaylistMusic matching the query, or a new PlaylistMusic object populated from the query conditions when no match is found
 *
 * @method PlaylistMusic findOneByPlaylistId(int $playlist_id) Return the first PlaylistMusic filtered by the playlist_id column
 * @method PlaylistMusic findOneByMusicId(int $music_id) Return the first PlaylistMusic filtered by the music_id column
 *
 * @method array findByPlaylistId(int $playlist_id) Return PlaylistMusic objects filtered by the playlist_id column
 * @method array findByMusicId(int $music_id) Return PlaylistMusic objects filtered by the music_id column
 *
 * @package    propel.generator.plugins.sebekePlugin.lib.model.om
 */
abstract class BasePlaylistMusicQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePlaylistMusicQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'propel', $modelName = 'PlaylistMusic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PlaylistMusicQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     PlaylistMusicQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PlaylistMusicQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PlaylistMusicQuery) {
            return $criteria;
        }
        $query = new PlaylistMusicQuery();
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
                         A Primary key composition: [$playlist_id, $music_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   PlaylistMusic|PlaylistMusic[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PlaylistMusicPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PlaylistMusicPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return   PlaylistMusic A model object, or null if the key is not found
     * @throws   PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT `PLAYLIST_ID`, `MUSIC_ID` FROM `playlist_music` WHERE `PLAYLIST_ID` = :p0 AND `MUSIC_ID` = :p1';
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
            $obj = new PlaylistMusic();
            $obj->hydrate($row);
            PlaylistMusicPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return PlaylistMusic|PlaylistMusic[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PlaylistMusic[]|mixed the list of results, formatted by the current formatter
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
     * @return PlaylistMusicQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PlaylistMusicPeer::PLAYLIST_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PlaylistMusicPeer::MUSIC_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PlaylistMusicQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PlaylistMusicPeer::PLAYLIST_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PlaylistMusicPeer::MUSIC_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the playlist_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPlaylistId(1234); // WHERE playlist_id = 1234
     * $query->filterByPlaylistId(array(12, 34)); // WHERE playlist_id IN (12, 34)
     * $query->filterByPlaylistId(array('min' => 12)); // WHERE playlist_id > 12
     * </code>
     *
     * @see       filterByPlaylist()
     *
     * @param     mixed $playlistId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlaylistMusicQuery The current query, for fluid interface
     */
    public function filterByPlaylistId($playlistId = null, $comparison = null)
    {
        if (is_array($playlistId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(PlaylistMusicPeer::PLAYLIST_ID, $playlistId, $comparison);
    }

    /**
     * Filter the query on the music_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMusicId(1234); // WHERE music_id = 1234
     * $query->filterByMusicId(array(12, 34)); // WHERE music_id IN (12, 34)
     * $query->filterByMusicId(array('min' => 12)); // WHERE music_id > 12
     * </code>
     *
     * @see       filterByMusic()
     *
     * @param     mixed $musicId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PlaylistMusicQuery The current query, for fluid interface
     */
    public function filterByMusicId($musicId = null, $comparison = null)
    {
        if (is_array($musicId) && null === $comparison) {
            $comparison = Criteria::IN;
        }

        return $this->addUsingAlias(PlaylistMusicPeer::MUSIC_ID, $musicId, $comparison);
    }

    /**
     * Filter the query by a related Playlist object
     *
     * @param   Playlist|PropelObjectCollection $playlist The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PlaylistMusicQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByPlaylist($playlist, $comparison = null)
    {
        if ($playlist instanceof Playlist) {
            return $this
                ->addUsingAlias(PlaylistMusicPeer::PLAYLIST_ID, $playlist->getId(), $comparison);
        } elseif ($playlist instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PlaylistMusicPeer::PLAYLIST_ID, $playlist->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByPlaylist() only accepts arguments of type Playlist or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Playlist relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PlaylistMusicQuery The current query, for fluid interface
     */
    public function joinPlaylist($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Playlist');

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
            $this->addJoinObject($join, 'Playlist');
        }

        return $this;
    }

    /**
     * Use the Playlist relation Playlist object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   PlaylistQuery A secondary query class using the current class as primary query
     */
    public function usePlaylistQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPlaylist($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Playlist', 'PlaylistQuery');
    }

    /**
     * Filter the query by a related Music object
     *
     * @param   Music|PropelObjectCollection $music The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return   PlaylistMusicQuery The current query, for fluid interface
     * @throws   PropelException - if the provided filter is invalid.
     */
    public function filterByMusic($music, $comparison = null)
    {
        if ($music instanceof Music) {
            return $this
                ->addUsingAlias(PlaylistMusicPeer::MUSIC_ID, $music->getId(), $comparison);
        } elseif ($music instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PlaylistMusicPeer::MUSIC_ID, $music->toKeyValue('PrimaryKey', 'Id'), $comparison);
        } else {
            throw new PropelException('filterByMusic() only accepts arguments of type Music or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Music relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PlaylistMusicQuery The current query, for fluid interface
     */
    public function joinMusic($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Music');

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
            $this->addJoinObject($join, 'Music');
        }

        return $this;
    }

    /**
     * Use the Music relation Music object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   MusicQuery A secondary query class using the current class as primary query
     */
    public function useMusicQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMusic($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Music', 'MusicQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PlaylistMusic $playlistMusic Object to remove from the list of results
     *
     * @return PlaylistMusicQuery The current query, for fluid interface
     */
    public function prune($playlistMusic = null)
    {
        if ($playlistMusic) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PlaylistMusicPeer::PLAYLIST_ID), $playlistMusic->getPlaylistId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PlaylistMusicPeer::MUSIC_ID), $playlistMusic->getMusicId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
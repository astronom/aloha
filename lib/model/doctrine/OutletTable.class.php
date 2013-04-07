<?php

/**
 * OutletTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class OutletTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object OutletTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Outlet');
    }

	public function getForList(Doctrine_Query $q)
	{
		$rootAlias = $q->getRootAlias();
		$q->leftJoin($rootAlias . '.Distributor distributor');
		$q->leftJoin($rootAlias . '.Region region');
		$q->leftJoin($rootAlias . '.City city');
		return $q;

	}

	public function getAllWithGeoByUserQuery($user, Doctrine_Query $query = null)
	{
		if($query)
			$q = $query;
		else
			$q = $this->createQuery();
		$rootAlias = $q->getRootAlias();
		$q = $this->getForList($q);
		$q->leftJoin($rootAlias. '.Worksheet worksheet');

		if($user->hasCredential('auditor'))
			$q->whereIn($q->getRootAlias().'.city_id', $user->getCityIds());
		if($user->hasCredential('coordinator'))
			$q->whereIn($q->getRootAlias().'.region_id', $user->getRegionIds());
		if($user->hasCredential('client')) {
			$q->whereIn($q->getRootAlias().'.region_id', $user->getRegionIds());
			$q->addWhere('worksheet.status = ? AND worksheet.photo_status = ? AND worksheet.audio_status = ?', array(30,30,30));
		}

		return $q;
	}

	public function getByRegionAndCityQuery($regionId, $cityId)
	{
		$q = $this->createQuery('outlet');
		$q->addWhere('outlet.region_id = ?', $regionId);
		$q->addWhere('outlet.city_id = ?', $cityId);

		return $q;
	}

	public function countByRegionAndCity($regionId, $cityId)
	{
		$q = $this->getByRegionAndCityQuery($regionId, $cityId);

		return $q->count();
	}

	public function findByRegionAndCity($regionId, $cityId)
	{
		$q = $this->getByRegionAndCityQuery($regionId, $cityId);

		return $q->execute(array(), Doctrine::HYDRATE_ARRAY);
	}

}
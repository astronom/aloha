<?php

/**
 * CityTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CityTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CityTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('City');
    }

	public function getCoordinatorCities()
	{
		$q = $this->createQuery('city')
				->addOrderBy('name ASC');

		$user = sfContext::getInstance()->getUser();

		if($user->hasCredential('coordinator'))
		{
			$coordinatorRegionIds = $user->getRegionIds();

			$q->whereIn('city.region_id', $coordinatorRegionIds);
		}

		return $q;
	}
}
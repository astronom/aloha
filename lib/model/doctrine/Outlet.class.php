<?php

/**
 * Outlet
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    aloha
 * @subpackage model
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Outlet extends BaseOutlet
{

	public static $types = array(
		'specialized' => 'сшм',
		'auto'  => 'авто',
		'market'    => 'рынок'
	);

	public static $groupTypes = array(
		'a' => 'a',
		'b'  => 'b'
	);
	public static $groupTypesRus = array(
		'a' => 'а',
		'b'  => 'в'
	);

	public function getHumanType()
	{
		if($this->getType())
			return self::$types[$this->getType()];
	}

	public function getHumanGroupType()
	{
		return self::$groupTypes[$this->getGroupType()];
	}

//	public function setType($value)
//	{
//		$value = strtolower($value);
//		if(!array_key_exists($value, self::$types))
//		{
//			$value = array_search($value, self::$types);
//		}
//
//		parent::setType($value);
//	}
//
//	public function setDistributorId($value)
//	{
//		$distributor = DistributorTable::getInstance()->findByName($value);
//		if(!$distributor)
//		{
//			$distributor = new Distributor();
//			$distributor->name = $value;
//			$distributor->save();
//		}
//
//		parent::setDistributorId($distributor->id);
//	}
}

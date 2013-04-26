<?php

/**
 * History
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    aloha
 * @subpackage model
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class History extends BaseHistory
{
	public static $eventCode = array(
		10 => 'Создание',
		20 => 'Редактирование',
		30 => 'Удаление',
	);

	public static function log($event, $object, $user)
	{
		$history = new History();
		$history->setEvent($event);
		$history->setModel(get_class($object));
		$history->setModelId($object->getId());
		if($user instanceof myUser)
			$user = $user->getGuardUser();
		$history->setSfGuardUser($user);

		$history->save();
	}
}
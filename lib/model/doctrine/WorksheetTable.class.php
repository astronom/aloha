<?php

/**
 * WorksheetTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class WorksheetTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object WorksheetTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Worksheet');
    }

	public function countDoneByOutlets($outletIds)
	{
		$q = $this->createQuery('worksheet');
		$q->whereIn('worksheet.outlet_id', $outletIds);
		$q->addWhere('worksheet.status = ? AND worksheet.photo_status = ? AND worksheet.audio_status = ?', array(30,30,30));

		return $q->count();
	}

	public function countCoordinatorDoneByOutlets($outletIds)
	{
		$q = $this->createQuery('worksheet');
		$q->whereIn('worksheet.outlet_id', $outletIds);
		$q->addWhere('worksheet.status >= ? OR worksheet.photo_status >= ? OR worksheet.audio_status >= ?', array(20,20,20));

		return $q->count();
	}

	public function countAuditorDoneByOutlets($outletIds)
	{
		$q = $this->createQuery('worksheet');
		$q->whereIn('worksheet.outlet_id', $outletIds);
		$q->addWhere('worksheet.status <= ? OR worksheet.photo_status <= ? OR worksheet.audio_status <= ?', array(20,20,20));

		return $q->count();
	}

	public function countAuditorNotDoneByOutlets($outletIds)
	{
		$q = $this->createQuery('worksheet');
		$q->whereIn('worksheet.outlet_id', $outletIds);
		$q->addWhere('worksheet.status <= ? OR worksheet.photo_status <= ? OR worksheet.audio_status <= ?', array(10,10,10));
		$q->orWhere('worksheet.status IS NULL OR worksheet.photo_status IS NULL OR worksheet.audio_status IS NULL');

		return $q->count();
	}

	public function findByAllStatus($allStatus, $hydrate)
	{
		$q = $this->createQuery('worksheet');

		if(array_key_exists('status', $allStatus))
		{
			if(is_null($allStatus['status']))
				$q->addWhere('worksheet.status IS NULL');
			else
				$q->addWhere('worksheet.status = ?', $allStatus['status']);
		}
		if(array_key_exists('photo_status', $allStatus))
		{
			if(is_null($allStatus['photo_status']))
				$q->addWhere('worksheet.photo_status IS NULL');
			else
				$q->addWhere('worksheet.photo_status = ?', $allStatus['photo_status']);
		}
		if(array_key_exists('audio_status', $allStatus))
		{
			if(is_null($allStatus['audio_status']))
				$q->addWhere('worksheet.audio_status IS NULL');
			else
				$q->addWhere('worksheet.audio_status = ?', $allStatus['audio_status']);
		}
		if(array_key_exists('audit_status', $allStatus))
		{
			$q->addWhere('worksheet.audit_status = ?', (int)$allStatus['audit_status']);
		}

		return $q->execute(array(), $hydrate);

	}

//	public function findByStatus($status, $hydrate)
//	{
//		$q = $this->createQuery('worksheet');
//		if(is_null($status))
//			$q->addWhere('worksheet.status IS NULL');
//		else
//			$q->addWhere('worksheet.status = ?', $status);
//
//		return $q->execute(array(), $hydrate);
//	}
//	public function findByPhotoStatus($status, $hydrate)
//	{
//		$q = $this->createQuery('worksheet');
//		if(is_null($status))
//			$q->addWhere('worksheet.photo_status IS NULL');
//		else
//			$q->addWhere('worksheet.photo_status = ?', $status);
//
//		return $q->execute(array(), $hydrate);
//	}
//	public function findByAudioStatus($status, $hydrate)
//	{
//		$q = $this->createQuery('worksheet');
//		if(is_null($status))
//			$q->addWhere('worksheet.audio_status IS NULL');
//		else
//			$q->addWhere('worksheet.audio_status = ?', $status);
//
//		return $q->execute(array(), $hydrate);
//	}
}
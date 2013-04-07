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
}
<?php

/**
 * Worksheet
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    aloha
 * @subpackage model
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Worksheet extends BaseWorksheet
{
	/**
	 * Возвращает коллекцию прикрепленных изображений товара
	 * @return Doctrine_Collection
	 */
	public function getImages()
	{
		return $this->getImageAttachments();
	}

	public function hasImages()
	{
		return $this->hasAttachmentsOfType('Image');
	}

	public function hasAudios()
	{
		return $this->hasAttachmentsOfType('Audio');
	}

	/**
	 * Возвращает коллекцию прикрепленных изображений товара
	 * @return Doctrine_Collection
	 */
	public function getAudios()
	{
		return $this->getAudioAttachments();
	}

}
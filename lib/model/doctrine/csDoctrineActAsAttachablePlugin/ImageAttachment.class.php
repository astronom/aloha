<?php

/**
 * ImageAttachment
 *
 * This class has been auto-generated by the Doctrine ORM Framework
 *
 * @package    aloha
 * @subpackage model
 * @author     Alexander Manichev a.manichev@gmail.com
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class ImageAttachment extends Attachment
{
	public function getResizedPath($width = null, $height = null)
	{
		$url = $this->getUrl();

		if(strlen($url) > 0)
		{
			$res = explode('.', $url);
			if ($width && $height) {
				$res[count($res) - 2] = $res[count($res) - 2] . '_' . $width . '_' . $height;
			}

			return $this->getBaseUploadPath() . implode('.', $res);
		}
		else
			return null;
	}

	public function getResizedHalthPath()
	{
		return $this->getResizedPath(50,50);
	}

	public function getResizedMiniPath()
	{
		return $this->getResizedPath(10,10);
	}

	public function getAttachmentResizedRoute($width = null, $height = null)
	{
		return $this->getDefaultResizedFilepath($width, $height);
	}

	public function getOriginalUrl()
	{
		return $this->getDefaultResizedFilepath();
	}

	public function getDefaultResizedFilepath($width = null, $height = null)
	{
		/* @todo Не ходит на диск а придумать как отдавать ссылки не на веб картинки напрямую */
		$path = $this->getResizedPath($width, $height);
		if(!file_exists($path))
			$path = $this->getUploadPath();

		return str_replace(sfConfig::get('sf_web_dir'), '', $path);
	}

	public function getThumbnail($width = null, $height = null)
	{
		return $this->getDefaultResizedFilepath($width, $height);
	}

	public function getCropPath()
	{
		$res = explode('.', $this->getUrl());
		$res[count($res) - 2] = $res[count($res) - 2] . '_crop';


		return $this->getBaseUploadPath() . implode('.', $res);

	}
}

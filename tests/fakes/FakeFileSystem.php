<?php
/**
Copyright 2012-2016 Nick Korbel

This file is part of Booked Scheduler.

Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Booked Scheduler is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
 */

require_once(ROOT_DIR . 'lib/FileSystem/namespace.php');

class FakeFileSystem implements IFileSystem
{
	/**
	 * @var string
	 */
	public $_AddedFileContents;

	/**
	 * @var string
	 */
	public $_AddedFileName;

	/**
	 * @var string
	 */
	public $_AddedFilePath;

	/**
	 * @var string
	 */
	public $_ExpectedContents;

	/**
	 * @var string
	 */
	public $_ContentsPath;

	/**
	 * @var string[]
	 */
	public $_RemovedFiles = array();

	public function Add($path, $fileName, $fileContents)
	{
		$this->_AddedFilePath = $path;
		$this->_AddedFileName = $fileName;
		$this->_AddedFileContents = $fileContents;
	}

	public function GetFileContents($fullPath)
	{
		$this->_ContentsPath = $fullPath;
		return $this->_ExpectedContents;
	}

	public function RemoveFile($fullPath)
	{
		$this->_RemovedFiles[] = $fullPath;
	}

	public function GetReservationAttachmentsPath()
	{
		return 'reservation/attachment/path';
	}
}
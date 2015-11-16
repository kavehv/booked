<?php
/**
Copyright 2011-2015 Nick Korbel

This file is part of Booked Scheduler is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Booked Scheduler.  If not, see <http://www.gnu.org/licenses/>.
*/

class ReservationValidationResult implements IReservationValidationResult
{
	private $_canBeSaved;
	private $_errors;
	private $_warnings;
	private $_canBeRetried;
	private $_retryParams;

	/**
	 * @param $canBeSaved bool
	 * @param $errors string[]
	 * @param $warnings string[]
	 * @param bool $canBeRetried
	 * @param array|ReservationRetryParameter[] $retryParams
	 */
	public function __construct($canBeSaved = true, $errors = null, $warnings = null, $canBeRetried = false, $retryParams = array())
	{
		$this->_canBeSaved = $canBeSaved;
		$this->_errors = $errors == null ? array() : $errors;
		$this->_warnings = $warnings == null ? array() : $warnings;
		$this->_canBeRetried = $canBeRetried;
		$this->_retryParams = $retryParams == null ? array() : $retryParams;
	}

	public function CanBeSaved()
	{
		return $this->_canBeSaved;
	}

	public function GetErrors()
	{
		return $this->_errors;
	}

	public function GetWarnings()
	{
		return $this->_warnings;
	}

	public function CanBeRetried()
	{
		return $this->_canBeRetried;
	}

	public function GetRetryParameters()
	{
		return $this->_retryParams;
	}
}
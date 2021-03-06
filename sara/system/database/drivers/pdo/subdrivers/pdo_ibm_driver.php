<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 3.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * PDO IBM DB2 Database Adapter Class
 *
 * Note: _DB is an extender class that the app controller
 * creates dynamically based on whether the query builder
 * class is being used or not.
 *
 * @package		CodeIgniter
 * @subpackage	Drivers
 * @category	Database
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/database/
 */
class CI_DB_pdo_ibm_driver extends CI_DB_pdo_driver {

	/**
	 * Sub-driver
	 *
	 * @var	string
	 */
	public $subdriver = 'ibm';

	// --------------------------------------------------------------------

	/**
	 * Class constructor
	 *
	 * Builds the DSN if not already set.
	 *
	 * @param	array	$params
	 * @return	void
	 */
	public function __construct($params)
	{
		parent::__construct($params);

		if (empty($this->dsn))
		{
			$this->dsn = 'ibm:';

			// Pre-defined DSN
			if (empty($this->hostname) && empty($this->HOSTNAME) && empty($this->port) && empty($this->PORT))
			{
				if (isset($this->DSN))
				{
					$this->dsn .= 'DSN='.$this->DSN;
				}
				elseif ( ! empty($this->database))
				{
					$this->dsn .= 'DSN='.$this->database;
				}

				return;
			}

			$this->dsn .= 'DRIVER='.(isset($this->DRIVER) ? '{'.$this->DRIVER.'}' : '{IBM DB2 ODBC DRIVER}').';';

			if (isset($this->DATABASE))
			{
				$this->dsn .= 'DATABASE='.$this->DATABASE.';';
			}
			elseif ( ! empty($this->database))
			{
				$this->dsn .= 'DATABASE='.$this->database.';';
			}

			if (isset($this->HOSTNAME))
			{
				$this->dsn .= 'HOSTNAME='.$this->HOSTNAME.';';
			}
			else
			{
				$this->dsn .= 'HOSTNAME='.(empty($this->hostname) ? '127.0.0.1;' : $this->hostname.';');
			}

			if (isset($this->PORT))
			{
				$this->dsn .= 'PORT='.$this->port.';';
			}
			elseif ( ! empty($this->port))
			{
				$this->dsn .= ';PORT='.$this->port.';';
			}

			$this->dsn .= 'PROTOCOL='.(isset($this->PROTOCOL) ? $this->PROTOCOL.';' : 'TCPIP;');
		}
	}

	// --------------------------------------------------------------------

	/**
	 * Show table query
	 *
	 * Generates a platform-specific query string so that the table names can be fetched
	 *
	 * @param	bool	$prefix_limit
	 * @return	string
	 */
	protected function _list_tables($prefix_limit = FALSE)
	{
		$sql = 'SELECT "tabname" FROM "syscat"."tables"
			WHERE "type" = \'T\' AND LOWER("tabschema") = '.$this->escape(strtolower($this->database));

		if ($prefix_limit ===��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ÿ
 ſ
 ǿ
 ɿ
 ˿
 Ϳ
 Ͽ
 ѿ
 ӿ
 տ
 ׿
 ٿ
 ۿ
 ݿ
 ߿
 �
 �
 �
 �
 �
 �
 ��
 �
 �
 �
 ��
 ��
 ��
 ��
 ��
 ��
 �
 �
 �
 �
 	�
 �
 �
 �
 �
 �
 �
 �
 �
 �
 �
 �
 !�
 #�
 %�
 '�
 )�
 +�
 -�
 /�
 1�
 3�
 5�
 7�
 9�
 ;�
 =�
 ?�
 A�
 C�
 E�
 G�
 I�
 K�
 M�
 O�
 Q�
 S�
 U�
 W�
 Y�
 [�
 ]�
 _�
 a�
 c�
 e�
 g�
 i�
 k�
 m�
 o�
 q�
 s�
 u�
 w�
 y�
 {�
 }�
 �
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 �
 �
 �
 �
 	�
 �
 �
 �
 �
 �
 �
 �
 �
 �
 �
 �
 !�
 #�
 %�
 '�
 )�
 +�
 -�
 /�
 1�
 3�
 5�
 7�
 9�
 ;�
 =�
 ?�
 A�
 C�
 E�
 G�
 I�
 K�
 M�
 O�
 Q�
 S�
 U�
 W�
 Y�
 [�
 ]�
 _�
 a�
 c�
 e�
 g�
 i�
 k�
 m�
 o�
 q�
 s�
 u�
 w�
 y�
 {�
 }�
 �
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 �
 �
 �
 �
 	�
 �
 �
 �
 �
 �
 �
 �
 �
 �
 �
 �
 !�
 #�
 %�
 '�
 )�
 +�
 -�
 /�
 1�
 3�
 5�
 7�
 9�
 ;�
 =�
 ?�
 A�
 C�
 E�
 G�
 I�
 K�
 M�
 O�
 Q�
 S�
 U�
 W�
 Y�
 [�
 ]�
 _�
 a�
 c�
 e�
 g�
 i�
 k�
 m�
 o�
 q�
 s�
 u�
 w�
 y�
 {�
 }�
 �
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 ��
 �
 �
 �
 �
 	�
 �
 �
 �
 �
 Z] \] ^] `] b] d] f] h] j] l] n] p] r] t] v] x] z] |] ~] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �] �]  ^ ^ ^ ^ ^ 
^ ^ ^ ^ ^ ^ ^ ^ ^ ^ ^  ^ "^ $^ &^ (^ *^ ,^ .^ 0^ 2^ 4^ 6^ 8^ :^ <^ >^ @^ B^ D^ F^ H^ J^ L^ N^ P^ R^ T^ V^ X^ Z^ \^ ^^ `^ b^ d^ f^ h^ j^ l^ n^ p^ r^ t^ v^ x^ z^ |^ ~^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �^ �
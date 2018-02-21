<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Migration_Attributes extends CI_Migration
{
	public function __construct()
	{
		parent::__construct();
	}

	public function up()
	{
		error_log('Migrating to Attributes');

		$sql = file_get_contents(APPPATH . 'migrations/sqlscripts/attributes.sql');

		/*
		CI migration only allows you to run one statement at a time.
		This small script splits the statements allowing you to run them all in one go.
		*/

		$sqls = explode(';', $sql);
		array_pop($sqls);

		foreach($sqls as $statement)
		{
			$statement = $statement . ';';

			if(!$this->db->simple_query($statement))
			{
				foreach($this->db->error() as $error)
				{
					error_log('error: ' . $error);
				}
			}
		}

		error_log('Migrated to Attributes');
	}

	public function down()
	{

	}
}
?>

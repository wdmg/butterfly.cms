<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;
use yii\db\Migration;
use yii\helpers\Console;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }

	private function recurse_copy($src, $dst) {

		$dir = \opendir($src);
		@mkdir($dst);

		while(false !== ( $file = \readdir($dir)) ) {
			if (( $file != '.' ) && ( $file != '..' )) {
				if ( is_dir($src . '/' . $file) ) {
					$this->recurse_copy($src . '/' . $file,$dst . '/' . $file);
				} else {
					return \copy($src . '/' . $file,$dst . '/' . $file);
				}
			}
		}

		\closedir($dir);
	}

	public function actionDemo()
	{
		$errors = [];
		echo $this->ansiFormat("Start of importing demo data...\n\n", Console::FG_YELLOW);

		$migration = new Migration();
		$dump_sql = file_get_contents(\Yii::getAlias('@app') . '/dump/example.sql');

		echo $this->ansiFormat("SQL dump...\n\n", Console::FG_GREEN);

		$results = $migration->execute($dump_sql);
		if (!$results)
			$errors[] = 'Error when importing SQL dump.';

		echo $this->ansiFormat("Copying images...\n\n", Console::FG_GREEN);

		$results = $this->recurse_copy(\Yii::getAlias('@app') . '/dump/uploads', \Yii::getAlias('@app') . '/web/uploads');
		if (!$results)
			$errors[] = 'Error when copying demo data.';

		if (empty($errors)) {
			echo $this->ansiFormat("Importing demo data complete.\n\n", Console::FG_GREEN);
			return ExitCode::OK;
		} else {
			echo $this->ansiFormat("Error Importing demo data!\n\n", Console::FG_RED);
			return ExitCode::UNSPECIFIED_ERROR;
		}
	}
}

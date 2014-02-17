<?php

namespace App\TaskBundle\Helpers;


use App\TaskBundle\Entity\Task;

class Encoder
{

	/**
	 * @param Task[] $tasks
	 * @return string[]
	 */
	public function encode( $tasks )
	{
		$result = array();
		foreach ( $tasks as $task ) {
			$result[] = $task->getName();
		}
		return $result;
	}
}
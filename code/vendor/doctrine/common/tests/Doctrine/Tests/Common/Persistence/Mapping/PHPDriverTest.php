<?php

namespace Doctrine\Tests\Common\Persistence\Mapping;

use Doctrine\Common\Persistence\Mapping\Driver\PHPDriver;
use Doctrine\Tests\DoctrineTestCase;

class PHPDriverTest extends DoctrineTestCase
{
	public function testLoadMetadata()
	{
		$metadata = $this->getMock('Doctrine\Common\Persistence\Mapping\ClassMetadata');
		$metadata->expects($this->once())->method('getFieldNames');

		$driver = new PHPDriver(array(__DIR__ . "/_files"));
		$driver->loadMetadataForClass('TestEntity', $metadata);
	}
}
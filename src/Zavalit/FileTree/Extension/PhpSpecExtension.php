<?php

namespace Zavalit\FileTree\Extension;

use PhpSpec\Extension\ExtensionInterface;
use PhpSpec\ServiceContainer;
use Zavalit\FileTree\PhpSpec\FileTreeGenerator;
use Zavalit\FileTree\Command\FileTreeCommand;

class PhpSpecExtension implements ExtensionInterface
{
	
	public function load(ServiceContainer $container)
	{
		$container->setShared('console.commands.filetree', function(){
			return new FileTreeCommand();
		});

	}

}
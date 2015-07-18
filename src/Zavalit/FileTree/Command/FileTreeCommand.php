<?php

namespace Zavalit\FileTree\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Yaml\Yaml;

class FileTreeCommand extends Command
{
	protected function configure()
	{
		$this->setName('filetree')
			 ->setDescription('Create a file tree');
	}
	
	protected function execute()
	{
		$container = $this->getApplication()->getContainer();
        $container->configure();
        

        $files = Yaml::parse(getcwd(). "/phpspec.filetree.yml");

		foreach ($files['filetree'] as $file) {
			$resource = $container->get('locator.resource_manager')->createResource($file);
        	$container->get('code_generator')->generate($resource, 'class');	
        	$container->get('code_generator')->generate($resource, 'specification');
		}
        
        
	}
}
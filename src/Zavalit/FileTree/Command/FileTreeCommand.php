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
        

        $config = Yaml::parse(getcwd(). "/phpspec.filetree.yml");

        $files = [];
        $this->extractFiles($config['filetree'], $files);

		foreach ($files as $file) {
			$file = substr($file, 1);
			$resource = $container->get('locator.resource_manager')->createResource($file);
        	$container->get('code_generator')->generate($resource, 'class');	
        	$container->get('code_generator')->generate($resource, 'specification');
		}
        
        
	}

	protected function extractFiles($config, &$files, $path=null)
	{

		foreach ($config as $key => $value) {
				
				if(is_array($value)){
					
					$path .= !is_int($key)?$key:'/';
					$path = str_replace('//', '/', $path);

					$this->extractFiles($value, $files, $path);

				}else{
					$files[] = $path . '/'.$value;
				}

		}
	}
}
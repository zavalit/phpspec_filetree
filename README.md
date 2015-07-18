# PhpSpec FileTree Extension

## how to

 first of all extend your phpspec.yml with the reference to this extension:

    extensions:
        - Zavalit\FileTree\Extension\PhpSpecExtension

 create a phpspec.filetree.yml config file with class names that you want to be created
 and put it in a place where you run your phpspec commmand.

 phpspec.filetree.yml can look smth like this:
    
    filetree:
      - Zavalit\Test\Example
      - Zavalit\Model\Example
      - Zavalit\Model\Example2
      - Zavalit\Test\Listeners\Example

and run 

    $ phpspec filetree

after that you should have 4 Classes created in a psr-0 conform way and also it's Specs.

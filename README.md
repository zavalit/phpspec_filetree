# PhpSpec FileTree Extension

## how to

 first of all extend your phpspec.yml with the reference to this extension:

    extensions:
        - Zavalit\FileTree\Extension\PhpSpecExtension

 create a phpspec.filetree.yml config file with class names that you want to be created
 and put it in a place where you run your phpspec commmand.

 phpspec.filetree.yml can look smth like this:
    
    filetree:
	 - Zavalit:
	     - Model:
	        - Cart
	        - Product
	        - User
	     - Business:
	        - Checkout
	        - Shippment
	        - Listeneres:
	           - StornoListener
	           - BayListener

and run 

    $ phpspec filetree

after that you should have 7 Classes created in a psr-0 conform way:
   - Zavalit\Model\Cart 
   - Zavalit\Model\Product
   - Zavalit\Model\User 
   - Zavalit\Business\Checkout
   - Zavalit\Business\Shippment 
   - Zavalit\Business\Listeneres\StornoListener
   - Zavalit\Business\Listeneres\BayListener

 and also it's Specs.

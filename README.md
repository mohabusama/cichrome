Cichrome
========

A CodeIgniter Library wrapper for Chrome Logger

Introduction
------------
This is a simple CodeIgniter wrapper for Chrome Logger's (http://craig.is/writing/chrome-logger) ChromePhp Library (https://github.com/ccampbell/chromephp).
The purpose is to integrate Chrome Logger (ChromePhp) with CodeIgniter's Log Configuration.

Installation and Requirements
-----------------------------
This library reuqires ChromePhp Library which can be found https://github.com/ccampbell/chromephp

## Installation

Add the files in your CodeIgniter libraries folder 

**application/libraries/Cichrome.php**

**application/libraries/chromelog/ChromePhp.php**

CodeIgniter Usage
-----------------
### Log Threshold
Cichrome Library depends on the log threshold defined in **application/config/config.php**

    /*
    0 = Disables logging, Error logging TURNED OFF
    1 = Error Messages (including PHP errors)
    2 = Debug Messages
    3 = Informational Messages
    4 = All Messages
    */
    $config['log_threshold'] = 4;

### Loading the Library
    $this->load->library('cichrome');
    
### Logging
Once you have loaded the library, you can start using it to log messages to your Chrome browser Console using ordinary log calls

    $this->cichrome->log('error', 'Logging an Error message!');
    
    // Or .. direct call without the level
    
    $this->cichrome->error('Logging an Error message!');
    
    // Same applies for other levels: debug, info (and warn)
    
    $this->cichrome->log('debug', 'Logging an Debug message!');
    $this->cichrome->debug('Logging a Debug message!');
    
    $this->cichrome->log('warn', 'Logging an Debug message!');
    $this->cichrome->warn('Logging a Warning message!');
    
    $this->cichrome->log('info', 'Logging an Debug message!');
    $this->cichrome->info('Logging an Info message!');
    
### Note
Chrome Logger depends on Google Chrome Extension https://chrome.google.com/webstore/detail/chrome-logger/noaneddfkdjfnfdakjjmocngnfkfehhd 
Make sure it is installed and **enabled** on the page you are testing.

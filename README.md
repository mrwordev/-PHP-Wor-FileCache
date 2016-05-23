# -PHP-Wor-FileCache
This is simple class that create file cache without using database, or any memcached.

## How-To
####Attributes
'''php
	private $FILE     = "";
    private $PATH     = "";
    private $Filepath = "";
'''

####Methods
#####constructor($filename[, $path])
Class constructor required $filename to instantiate class which will use this value to create cache file name corresponding to parameter.
```php
	$cache = new WorFileCache("Test");
```
This will result in creating Test.txt file and store to current folder where this class belong. Else if file already exist, such file will open instead.

$path is optional, depend on your system to using this parameter. Path is related to root folder which this class stored. Multi layer of folders is accepted.
```php
	$cache = new WorFileCache("Test", "/CacheFolder");
```
This will result in createing folder CacheFolder then store Test.txt inside.

#####setCache($key, $value)
Create new cache in "Key to value" format. Data will store inside file that create during instantiate object.
```php
	$cache = new WorFileCache("Test");
	$cache.setCache("User","Wor");
```
This will result in cache information stored in file Test.txt. Mapped by key name "User" with value "Wor" in it.

#####getCache($key)
Retrieving data from cache with given key. If key is not set empty "" will be return.
```php
	$cache = new WorFileCache("Test");
	$cache.setCache("User","Wor");
	$response = $cache.getCache("User");
	echo $response;
```
Word "Wor" will be printed on page.
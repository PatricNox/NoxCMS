<p align="center">
  <img src="https://PatricNox.info/assets/NoxCMS.png" alt="drawing" width="200"/>
</p>

# NoxCMS
If you see this, then it is probably because you got access to a time limited demonstration and overview of code.
> Project is under heavy development. 

## Core Structure

```
index -> common.php -> startup.php

index
-----> sets root of the cms, loads common

common
---> init loads functions.php and startup.php & base routes (/install)
----->  checks if the site is installed (this begins in startup.php)

startup
----> Initialise class autoloader
----> Initialise database session
------> checks if cms is installed
------> setup base route
````

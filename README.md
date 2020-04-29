### WORK IN PROGRESS

I am adding things as I need them so not all API features are implemented.  It should be relatively easy to look through the code and add anything that is not there yet.

#### Terraform API V2

This is based on the Digital Ocean API V2
https://github.com/toin0u/TerraformV2

===============

Installation
------------

If installing on Laravel use the install instructions at https://github.com/sdwru/Laravel-TerraformV2.

You can install the bindings via Composer. If installing standalone to some generic php framework add the following to your composer.json
```
"require": {
    "sdwru/terraform-v2": "dev-master"
},
"repositories": [
    { "type": "git", "url": "https://github.com/sdwru/terraform-v2.git" }
],
```
And run `composer update` from cli.

To use the bindings, use Composer's autoload:
```
require_once('vendor/autoload.php');
```

This package should install guzzle automatically but if not install as follows:
```bash
composer require guzzlehttp/guzzle:^6.0
```
#### Example
```php
<?php

require 'vendor/autoload.php';

use TerraformV2\Adapter\GuzzleAdapter;
use TerraformV2\TerraformV2;

// create an adapter with your access token which can be
// generated at https://app.terraform.io/app/<MyAccountName>/settings/authentication-tokens
$adapter = new GuzzleAdapter('your_access_token');

// create a terraform object with the previous adapter
$terraform = new TerraformV2($adapter);
```
Me
-------
```php
// ...
// return the the account api
$me = $awx->me();

// Get the info for the account
$userInformation = $me->getAll();
````

Job Template
------

```php
// ..
// return the job template api
$jobTemplate  = $awx->jobTemplate();

// return a collection of job template entity
$actions = $jobTemplate->getAll();

// return the Job Template entity 123
$JobTemplate123 = $jobTemplate->getById(123);
```

Contributing
------------

Please see [CONTRIBUTING](https://github.com/sdwru/terraform-v2/blob/master/CONTRIBUTING.md) for details.

Changelog
---------

Please see [CHANGELOG](https://github.com/toin0u/terraform-v2/blob/master/CHANGELOG.md) for details.

Credits
-------

* [Antoine Corcy](https://twitter.com/toin0u)
* [Graham Campbell](https://twitter.com/GrahamCampbell)
* [Yassir Hannoun](https://twitter.com/yassirh)
* [Liverbool](https://github.com/liverbool)
* [Marcos Sigueros](https://github.com/alrik11es)
* [Chris Fidao](https://github.com/fideloper)
* [All contributors](https://github.com/toin0u/AwxV2/contributors)

Support
-------

[Please open an issue in github](https://github.com/sdwru/terraform-v2/issues)

Contributor Code of Conduct
---------------------------

As contributors and maintainers of this project, we pledge to respect all people
who contribute through reporting issues, posting feature requests, updating
documentation, submitting pull requests or patches, and other activities.

We are committed to making participation in this project a harassment-free
experience for everyone, regardless of level of experience, gender, gender
identity and expression, sexual orientation, disability, personal appearance,
body size, race, age, or religion.

Examples of unacceptable behavior by participants include the use of sexual
language or imagery, derogatory comments or personal attacks, trolling, public
or private harassment, insults, or other unprofessional conduct.

Project maintainers have the right and responsibility to remove, edit, or reject
comments, commits, code, wiki edits, issues, and other contributions that are
not aligned to this Code of Conduct. Project maintainers who do not follow the
Code of Conduct may be removed from the project team.

Instances of abusive, harassing, or otherwise unacceptable behavior may be
reported by opening an issue or contacting one or more of the project
maintainers.

This Code of Conduct is adapted from the [Contributor
Covenant](http:contributor-covenant.org), version 1.0.0, available at
[http://contributor-covenant.org/version/1/0/0/](http://contributor-covenant.org/version/1/0/0/).

License
-------

AwxV2 is released under the MIT License. See the bundled
[LICENSE](https://github.com/sdwru/terraform-v2/blob/master/LICENSE) file for details.
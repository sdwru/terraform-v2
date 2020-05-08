### Terraform Cloud API V2
#### Requirements
* PHP v7.1+

This is based on the Digital Ocean API V2
https://github.com/toin0u/TerraformV2

I took out the buzz http client adapter from the upstream project because I don't see any reason to use that.  I left in the guzzle adapter and interface because it does no do any harm staying in there and makes it easier pulling in updates from the upstream project.  It also leaves open the possibility of adding other clients in the future or making other changes that remain independent of the guzzle client.

#### WORK IN PROGRESS

I am adding things as I need them for my project so not all API features are implemented.  It should be relatively easy to look through the code and add anything that is not there based on your needs.  If you do that, please submit pull requests so that others can benefit.  I don't intend to make this a feature complete library on my own.  For what I am doing, I plan to do many creates, updates, deletions etc. from the Terraform cloud GUI.  I will be using the API mostly for displaying lists and configurations and triggering runs.

===============

Installation
------------

If installing on Laravel use the install instructions at https://github.com/sdwru/Laravel-Terraform.

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

This package should install guzzle automatically if it is not already installed, but if not install as follows:
```bash
composer require guzzlehttp/guzzle:^6.3
```
### Examples

First, get new API instance
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
Account Example
-------
```php
// ...
// return the the account api
$account = $terraform->account()

// return user information
$me = $account->getUserInformtion();
````

Organization Example
------

```php
// ..
// return the organization api
$organization  = $terraform->organization();

// return a collection of organization entity
$allOrgs = $organization->getAll();

// return the organization entity SomeOrgName
$myOrg = $organization->getByName('SomeOrgName');
```
Workspace Example
------
Create a new workspace that uses terraform configuration from exising github repository `someuser/terraform-digitalocean-basic`
default (`master`) branch using existing OAuth Token ID for the organization`ot-zodQQ9enMBdopBCK`.  This token ID can be retrieved from Terraform Cloud GUI `organization > Settings > VCS Providers` or using the API.
```php
$attributes = array(
    'vcs-repo' => array(
        'identifier' => 'someuser/terraform-digitalocean-basic',
        'oauth-token-id' => 'ot-zodQQ9enMBdopAFJ',
        'branch' => '',
        'default=branch' => true
    )
);

$organization = 'SomeExistingOrganization';
$newWorkspace = $terraform->workspace()->create($organization, $attributes);
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

TerraformV2 is released under the MIT License. See the bundled
[LICENSE](https://github.com/sdwru/terraform-v2/blob/master/LICENSE) file for details.

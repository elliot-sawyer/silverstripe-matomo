[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/elliot-sawyer/silverstripe-matomo/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/elliot-sawyer/silverstripe-matomo/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/elliot-sawyer/silverstripe-matomo/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/elliot-sawyer/silverstripe-matomo/?branch=master)
[![CircleCI](https://circleci.com/gh/elliot-sawyer/silverstripe-matomo.svg?style=svg)](https://circleci.com/gh/elliot-sawyer/silverstripe-matomo)


[![codecov](https://codecov.io/gh/elliot-sawyer/silverstripe-matomo/branch/master/graph/badge.svg)](https://codecov.io/gh/elliot-sawyer/silverstripe-matomo)

# SilverStripe Matomo integration
Adds Matomo analytics tracking to your SilverStripe website

* Apply via extension to any frontend ContentController object
* enable or disable using SiteConfig settings
* allow users to opt-out of Javascript tracking
* exclude specific pages from tracking using the CMS

Working with a content security policy
--------------------------------------
Is your site working with a strict content security policy? Great! You'll need to whitelist your Matomo endpoint to avoid violating your CSP.

... img-src 'self' https://your.matomowebsite.nz blob: data:; 
... script-src 'self' https://your.matomowebsite.nz 'sha384-BaSE64ENC0D3D';...


The `img-src` rule is to allow a tracking pixel to be embedded on the website. `script-src` is used by Matomo to execute the script on the website. You may need to add a nonce value for the inline script for it to run correctly. 

Contributing
------------

Contributions are more than welcome! Please raise some issues or create pull requests on the Github repo.

Support
--------
Need some extra help or just love my work? Consider shouting me a coffee or a small donation if this module helped you solve a problem. I accept cryptocurrency at the following addresses:
* Bitcoin: 12gSxkqVNr9QMLQMMJdWemBaRRNPghmS3p
* Bitcoin Cash: 1QETPtssFRM981TGjVg74uUX8kShcA44ni
* Litecoin: LbyhaTESx3uQvwwd9So4sGSpi4tTJLKBdz
* Ethereum: 0x0694E0704c70D8d178dd2e9522FC59EBBEe86748

# Lowercase URI Path Segment

## Installation

`composer require meteko/lowercase-pathsegment`

## What does it do

Via the signal/slot `nodePropertychanged` this package make sure the pathSegment (used for routing) is always lowercase.

## Possible client side validation

It's also possible to make a client side validation "version" of this.

By changing the regular expression validation for `Neos.Neos:Document` to `regularExpression: '/^[a-z0-9\-]+$'` (removing the `/i`) you make it case-sensible.

This will make it impossible so `Apply` until there is no uppercase characters in the field (and therefore, passing the validation)

## Support

Free support in the [Neos Slack channel](http://slack.neos.io/) and bug/features via the **Issues** and **Merge request** feature ohere on Github!

## A great thanks goes to

Thanks to danish scout organization [Frivilligt Drenge- Og Pige-Forbund, FDF](https://www.fdf.dk) for sponsoring this work and releasing it, for you to use free of charge!

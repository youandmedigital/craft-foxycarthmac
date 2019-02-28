<p align="center">
    <img src="https://github.com/jonleverrier/craft-foxycart-hmac/blob/master/src/icon.svg" alt="Craft FoxyCart Hmac" width="150"/>
</p>

# FoxyCart HMAC plugin for Craft CMS 3.1

FoxyCart HMAC is a cryptographic method to prevent people from tampering with your product links.

Using a hash (specifically with HMAC) provides a very secure way to ensure data is not modified. So your add-to-cart links and forms can be locked down, preventing any user from modifying your FoxyCart products.

More information can be found on the [FoxyCart HMAC page](https://wiki.foxycart.com/v/2.0/hmac_validation)

## Requirements

This plugin requires Craft CMS 3.1 or later and a [FoxyCart](https://www.foxy.io/) account.

## Installation

To install the plugin, follow these instructions.

1. Open your terminal and go to your Craft project:

        cd /path/to/project

2. Then tell Composer to load the plugin:

        composer require youandmedigital/craft-foxycarthmac

3. In the Control Panel, go to Settings → Plugins and click the “Install” button for FoxyCart HMAC.

## FoxyCart HMAC Overview

This plugin provides you with a set of new twig tags called `{% hmac %}` and `{% endhmac %}`.

## Configuring FoxyCart HMAC

After you have installed the plugin, enter your API Key and Cart URL into the FoxyCart HMAC plugin settings. You can also use environment variables to use different account information between development, staging and production environments.

Next you will need to enable "would you like to enable cart validation?" under Store > Advanced settings in your FoxyCart control panel.

## Using FoxyCart HMAC

Once you are setup, you can wrap your add-to-cart links with the new `{% hmac %}` twig tag. Here's an example:
```
{% hmac %}
<p>
    <a href="https://foxycarturl.com/cart?name=Product+Name&price=150&code=1234&empty=reset&cart=checkout">Book Now</a>
</p>
{% endhmac %}
```

If successful, your cart links will now render like this example:
```
https://foxycarturl.com/cart?name=Product+Name||ab1e0225fb2fb7f0a08237fd0f6c1f9f6eaf15594454e63fe8cc222a89413993&price=150||c451bb9b6dc8074201cc2e32fa3c17b48f66b4c847a6440f7cb3a872a6b4bf12&code=1234||6ceb4e60cdfd070730d2c36aa3d65d742922efc98ac69c428c62d20532782614&empty=reset&cart=checkout
```

## FoxyCart HMAC Roadmap

Some things to do, and ideas for potential features:

* Release it

Brought to you by [You & Me Digital](https://youandme.digital)

# NOTICE!

This module uses 'content negotion' to determine the response type (html, json, xml etc.) of the page. In theory, this is the best way to handle Views which could be used for multiple response types. However, content negotiation is handled differently by every browser so this is not useful in practice. See <https://github.com/Luwe/Kohana-Base-Alternative> for a more useful alternative.

Also see <http://www.gethifi.com/blog/browser-rest-http-accept-headers> on this topic.

# LJBase module

*Start new Kohana projects using using accept header based request handling*

- **Version:** 0.2.0
- **URL:** <https://github.com/Luwe/Kohana-Base>

## Description

LJBase is a Kohana based module used to setup default settings for a template based website. The default controller sets the response format to the accept-type in the HTTP request headers. This way, the scripter can choose to send back the appropriate View in the desired format (HTML, JSON, XML, PDF) without troubles. This is particularly useful for HMVC powered websites and Ajax widgets.

LJBase aims to keep controllers light and therefore uses Kostache to separate application logic from View logic.

## Used Kohana modules

- ### kohana/core
  - **url** : <https://github.com/kohana/core>
  - **version** : `3.1.x`
  
- ### modules/kostache
	- **url** : <https://github.com/zombor/KOstache>
  - **version** : `3.1.x`
  
## Disclaimer

I'm not perfect, so don't use this module blindly without knowing what it does. Also, help is always appreciated when it comes to refining the sourcecode.

~ Lieuwe Jan Eilander

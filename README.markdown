# LJBase module

*Start new projects using basic configurations*

- **Version:** 0.1.0
- **URL:** <http://github.com/none>

## Description

LJBase is a Kohana based module used to setup default settings for a template based website. The default controller sets the response format to the accept-type in the HTTP request headers. This way, the scripter can choose to send back the appropriate View in the desired format (HTML, JSON, XML, PDF) without troubles. This is particularly useful for HMVC powered websites and Ajax widgets.

LJBase aims to keep controllers light and therefore uses Kostache to separate application logic from View logic.

## Used Kohana modules

- ### kohana/core
  - **url** : `https://github.com/kohana/core.git`
  - **version** : `3.1.x`
  
- ### modules/kostache
	- **url** : `git://github.com/zombor/KOstache.git`
  - **version** : `3.1.x`
  
## Disclaimer

I'm not perfect, so don't use this module blindly without knowing what it does. Also, help is always appreciated when it comes to refining the sourcecode.

~ Lieuwe Jan Eilander

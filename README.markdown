# LJBase module

*Start new Kohana projects using using accept header based request handling*

- **URL:** <https://github.com/Luwe/Kohana-Base>

## Description

LJBase is a Kohana based module used to setup default settings for a template based website. The default controller sets the response format to the accept-type in the HTTP request headers. This way, the scripter can choose to send back the appropriate View in the desired format (HTML, JSON, XML, PDF) without troubles. This is particularly useful for HMVC powered websites and Ajax widgets.

LJBase aims to keep controllers light and therefore uses Kostache to separate application logic from View logic.

## Used Kohana modules

- ### kohana/core
  - **url** : <https://github.com/kohana/core>
  - **version** : `3.3.x`
  
- ### modules/kostache
	- **url** : <https://github.com/zombor/KOstache>
  - **version** : `4.0.x`
  
## Disclaimer

I'm not perfect, so don't use this module blindly without knowing what it does. Also, help is always appreciated when it comes to refining the sourcecode.

~ Lieuwe Jan Eilander

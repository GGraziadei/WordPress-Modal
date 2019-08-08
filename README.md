# WordPress Modal
Create a responsive modal in your WordPress site without use plug-in.

## Installation
- Add and customize the modal.php code in functions.php 
- Save and add the shortcode with parameters

## Parameters
-id: provides a unique ID to each box (string, mandatory)
-label: link label (text)
-title: part of the modal box header (text)
-subtitle: part of the modal box header (text)
-icon: part of the modal box header (text, should be the classes to show icons - ex: fa fa-star)
-color: color used on the modal box header (text, hex structure)
-padding: controls the content section padding (integral, without the px)
-width: controls the modal box width (integral, without the px)
-attached: controls the modal box position (default center - takes: top, bottom)
-timeout: controls the modal box showing time (integral)
-timeoutProgressbar: controls if the modal will show the progress bar (default 0 - takes: 1)

## Exemple 
[pippoModal id="gimme-a-call" label="Give us a phone call" title="Monday - Friday / 8AM to 6PM
" icon="fa fa-phone" padding="15" width="300"]CUSTOM HTML [/pippoModal]

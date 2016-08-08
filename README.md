# nokia-nbu-contact-importer

A utility to parse the contacts from nokia's contact backup file formats (*.nbu). This utility also helps you to sync the backed up contacts to your Google Contacts.

(Demo Link:)[http://demos.rajshtomjoe.com/nokia/]

## Installation & Dependencies

This package and its dependencies can be installed using `composer`. 

## Setup

1. Install required dependencies. See the 'Dependencies' section above.
2. Copy or rename `.config_blank.json` to `.config.json`. Note the dot (`.`) at the beginning of the file name.
3. Fill in the `clientID`, `clientSecret` in `.config.json`.
  * The `clientID` and `clientSecret` can be found in the Google Developers console at https://console.developers.google.com/ under 'APIs & auth' -> 'Credentials', after enabling the Contacts API.
4. Go to `index.php` in a web browser. 
5. Setup is done!

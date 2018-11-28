# CRONJOBS

## Instructions
  1. Open your crontab with the command `contab -e`;
  2. Make sure that the directory `/var/www/Nomads/cronjobs/` is correct, otherwise fix it accordingly;
  3. Paste the recommended settings below;
  4. Done;

## Recommended settings
`# NOMADS CRONTAB  
*/20 * * * * php /var/www/Nomads/cronjobs/session_killer.php
`

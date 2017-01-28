## File encryption and decryption


A simple program to encrypt and decrypt a file. Uses [defuse/php-encryption](https://github.com/defuse/php-encryption) for encryption and [symfony/console](https://github.com/symfony/console) for console interface.

### Install

- clone
- `composer install`
- set `./main.php` as executable

### Run

- For encryption `./main.php encrypt <inputfile> <outputfile>`
- For decryption `./main.php decrypt <inputfile> <outputfile>`

The program prompts for a passphrase.

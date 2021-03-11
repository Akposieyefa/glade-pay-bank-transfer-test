## Backend Developer Task for Glade Pay Bank Transfer API

This package take cares of initialize glade pay bank tranfer flow, returns account details to make payment to.
Verifies the glade pay bank transfer status, returns status of payment. Installation will be thorugh comoser once it is registerd in https://packagist.org/ After installation of this package:

- Run the blow command
- Composer install
- Composer dump-autoload
- Create a new .env and add your glade pay keys

## Usage of Bank Transfer Option

```php
$trax = new BankTransaction();
$response = $trax->amountCharged('1500')->customUserData(['email' => "orutu1@gmail.com","firstname" => "Orutu", "lastname" => "Akposieyefa"])->run(); 
print_r($response);
```
The above code is for initializing bank transfer and for returning the account details.

## Verify Bank Transfer Payment

```php
$verify = new VerifyTransaction('Glade2214920620210311O');
$response = $verify->run(); 
print_r($response); 
```
The above code verify bank transfer payment and return the payment status.
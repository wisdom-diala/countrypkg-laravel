# countrypkg-laravel
package to fetch all countries and states around the world and store in the database

## IMPORTANCE OF THE PACKAGE
**NO API CALLS**: Over the years i have been working with many API's that will help in getting countries with their State/Province, Making an API calls to the endpoint everytime a user visits the site, most of the times slow down the site while getting response from the third party website where the API was hosted. This packages eliminates any API calls of any such, you now have alll the countries in your local database by running a simple command.

## FEATURES
**Generate Countries**: This package helps you to generate countries around the world and save it inside your existing or newly created database without hitting any API endpoint.

**Generate States**: This package  helps you to generate states/Province around the world with country ID generated initially when the country table  was created. You can also generate State/Province for a particular country by specifying the country name you want to generate for.

# USAGE
## Install Package
```
composer require wisdom-diala/countrypkg-laravel
```
### Create database if you don't have any database yet.
### Run migration
```
php artisan migrate
```
After running migration, it will create two tables countries and states table

### Run this command on your terminal to generate countries
```
php artisan g:c
```
This command will generate all countries around the world with it's country code and short name and save it in the countries table it created earlier.

### Run this command on your terminal to generate all states/province
```
php artisan g:s all
```
This command generate all states with it's country ID from the country table that was initially created.

### To generate states/province for a particular country run this command
``` 
php artisan g:s Nigeria
```
This command will generate all states/province in Nigeria.

## Using it in your controller
```php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use WisdomDiala\Countrypkg\Models\Country;
use WisdomDiala\Countrypkg\Models\State;

class TestController extends Controller
{
    public function getAllCountries()
    {
    	$countries = Country::all();
    	return view('pages.countries', compact('countries'));
    }

    public function getAllStates()
    {
    	$states = State::all();
    	return view('pages.states', compact('states'));
    }
}
```
Note: Make sure you import the Country and State Model that was shipped with the package.
#### That's all, you now have states and countries records in your local database and can use it anytime you want.

Countries and states records pulled from this API https://www.universal-tutorial.com/

### Note: After installation of the package, you don't need any internet connection to generate the countries and states again.

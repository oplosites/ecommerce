<?php

/**
 * Managing OCommerce products
 *
 * Products management of OCommerce involves entities of products, product
 * images, categories, and product types
 *
 * @category   Controller
 * @package    App\Modules\Products\Controllers\ProductController
 * @author     Restu Arif Priyono <priyono.arif@gmail.com>
 * @copyright  2016 oplosite
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: @package_version@
 * @link       http://oplosite.com
 */

namespace App\Modules\Products\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Modules\Products\Models\Categories;

class CategoriesController extends \App\Http\Controllers\Controller
{
    /*
     * Base package module for this controller
     */
    private $controller = '\App\Modules\Products\Controllers\HomeController';

    /*
     * Name of this module
     */
    private $module = 'Home';

    /*
     * Name of module in lowercase and plural style
     */
    private $plural = 'homes';

    /*
     * Name of module in lowercase and singular style
     */
    private $singular = 'home';

    /*
     * Main index method to display front page
     */
    public function index(Request $request)
    {
        return view('Front::index');
    }
}

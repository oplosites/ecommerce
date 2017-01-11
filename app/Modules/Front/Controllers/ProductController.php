<?php

/**
 * Managing Reine's front landing page
 *
 * @category   Controller
 * @package    App\Modules\Products\Controllers\ProductController
 * @author     Restu Arif Priyono <priyono.arif@gmail.com>
 * @copyright  2016 oplosite
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    Release: @package_version@
 * @link       http://oplosite.com
 */

namespace App\Modules\Front\Controllers;

use Mail;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Modules\Front\Models\Slider;
use Illuminate\Support\Facades\Input;
use App\Modules\Products\Models\Products;
use App\Modules\Products\Models\Categories;

class ProductController extends \App\Http\Controllers\Controller
{
    /*
     * Base package module for this controller
     */
    private $controller = '\App\Modules\Products\Controllers\ProductController';

    /*
     * Name of this module
     */
    private $module = 'Product';

    /*
     * Name of module in lowercase and plural style
     */
    private $plural = 'products';

    /*
     * Name of module in lowercase and singular style
     */
    private $singular = 'product';

    /*
     * Main index method to display front page
     */
    public function index(Request $request)
    {
        return view('Front::landing', [
            'data' => Slider::all()
        ]);
    }

    public function show($id)
    {
        if (empty($id)) {
            return redirect('/');
        }

        return view('Front::product', [
            'data' => Products::find($id)
        ]);
    }
}

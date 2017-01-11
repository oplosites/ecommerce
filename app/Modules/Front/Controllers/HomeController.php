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

class HomeController extends \App\Http\Controllers\Controller
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
        return view('Front::landing', [
            'data' => Slider::all()
        ]);
    }

    public function contact(Request $request)
    {
        $content = '<table><tr><td>Nama</td><td>: ' . $request->input('name') . '</td></tr><tr><td>Email</td><td>: ' . $request->input('to') . '</td></tr><tr><td>Isi</td><td>: ' . $request->input('content') . '</td></tr></table>';

        Mail::send('Base::templates/emails/generic-responsive', [
            'title' => 'Kontak Baru',
            'pretext' => 'Seseorang telah menghubungi kamu. Berikut ini adalah detilnya:',
            'content' => "Seseorang telah menghubungi kamu. Berikut ini adalah detilnya: $content",
        ], function ($mail) use ($request) {
            $mail->from('oplosite@gmail.com', 'Reine')
                ->to('priyono.arif@gmail.com', 'Admin Reine')
                ->subject($request->input('subject'));
        });

        return view('Front::static/email-success');
    }

    public function appointment()
    {
        $id = Input::get('id');
        $product = null;

        if (!empty($id)) {
            $product = Products::find($id);
        }

        return view('Front::static/appointment', [
            'data' => $product
        ]);
    }

    public function createAppointment(Request $request)
    {
        $content = '<table><tr><td>Nama</td><td>: ' . $request->input('title') . ' ' . $request->input('first-name') . ' ' . $request->input('last-name')
            . '</td></tr><tr><td>Email</td><td>: ' . $request->input('email')
            . '</td></tr><tr><td>Telepon</td><td>: ' . $request->input('phone')
            . '</td></tr><tr><td>Schedule</td><td>: <b>' . $request->input('schedule') . '</b>'
            . '</td></tr><tr><td>Preferensi Kontak Email</td><td>: ' . ($request->input('contact-email') ? 'Ya' : 'Tidak')
            . '</td></tr><tr><td>Preferensi Kontak Telepon</td><td>: ' . ($request->input('contact-phone') ? 'Ya' : 'Tidak')
            . '</td></tr></table>';

        Mail::send('Base::templates/emails/generic-responsive', [
            'title' => 'Kontak Baru',
            'pretext' => '',
            'content' => "Seseorang telah menghubungi kamu. Berikut ini adalah detilnya: $content",
        ], function ($mail) use ($request) {
            $mail->from('oplosite@gmail.com', 'Reine')
                ->to('priyono.arif@gmail.com', 'Admin Reine')
                ->subject('Reine Appointment');
        });

        Mail::send('Base::templates/emails/generic-responsive', [
            'title' => 'Kontak Baru',
            'pretext' => '',
            'content' => "Appointment detail for Reine: $content",
        ], function ($mail) use ($request) {
            $mail->from('oplosite@gmail.com', 'Reine')
                ->to($request->input('email'), 'Admin Reine')
                ->subject('Reine Appointment');
        });

        return view('Front::static/email-success');
    }

    public function assistance()
    {
        $id = Input::get('id');
        $product = null;

        if (!empty($id)) {
            $product = Products::find($id);
        }

        return view('Front::static/assistance', [
            'data' => $product
        ]);
    }

    public function createAssistance(Request $request)
    {
        $content = '<table><tr><td>Nama</td><td>: ' . $request->input('name')
            . '</td></tr><tr><td>Email</td><td>: ' . $request->input('email')
            . '</td></tr><tr><td>Telepon</td><td>: ' . $request->input('phone')
            . '</td></tr><tr><td>Isi</td><td>: ' . $request->input('message')
            . '</td></tr></table>';

        Mail::send('Base::templates/emails/generic-responsive', [
            'title' => 'Kontak Baru',
            'pretext' => '',
            'content' => "Seseorang telah melakukan request assistance. Berikut ini adalah detilnya: $content",
        ], function ($mail) use ($request) {
            $mail->from('oplosite@gmail.com', 'Reine')
                ->to('priyono.arif@gmail.com', 'Admin Reine')
                ->subject('Reine Appointment');
        });

        Mail::send('Base::templates/emails/generic-responsive', [
            'title' => 'Kontak Baru',
            'pretext' => '',
            'content' => "Appointment detail for Reine: $content",
        ], function ($mail) use ($request) {
            $mail->from('oplosite@gmail.com', 'Reine')
                ->to('priyono.arif@gmail.com', 'Admin Reine')
                ->subject($request->input('subject'));
        });

        return view('Front::static/email-success');
    }
}

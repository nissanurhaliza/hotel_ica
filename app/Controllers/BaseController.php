<?php

namespace App\Controllers;

use App\Models\Fhotel;
use App\Models\FKamar;
use App\Models\Kamar;
use App\Models\Petugas;
use App\Models\Reservasi;
use App\Models\TipeKamar;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        $this->tipe_kamar = new TipeKamar();
        $this->kamar = new Kamar();
        $this->fhotel = new Fhotel();
        $this->fkamar = new FKamar();
        $this->petugas = new Petugas();
        $this->reservasi = new Reservasi();

        // E.g.: $this->session = \Config\Services::session();
    }
}

<?php


namespace aplicacion\Http\Controllers;

use Illuminate\Http\Request;
use Utils;
use aplicacion\Http\Requests;
use aplicacion\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use TestBL;

class testController extends Controller
{

    //Test Grid Datatables

    public function vistaGridDatatables()
    {
        return view('test.vistaGridDatatables');
    }

    public function getGridDataTables()
    {

        $Bl = new TestBL();

        $dataGrid = $Bl->getDataGridTest(3);

        return json_encode(["data" => $dataGrid]);

    }

    //Test Grid Kendo

    public function vistaGridKendo()
    {
        return view('test.vistaGridKendo');
    }

    public function getGridKendo(Request $rq)
    {

        $Bl = new TestBL();

        $dataGrid = $Bl->getDataGridTest(3);

        $request = file_get_contents('php://input');

        $input = json_decode($request);

        $util = new Utils();

        return $util->getDataRequest($dataGrid, $input);

    }

    //Test Dropdown Kendo

    public function vistaDropdownKendo()
    {
        return view('test.vistaDropdownKendo');
    }

    public function getDropDownKendo()
    {

        $Bl = new TestBL();

        $dataDropdown = $Bl->getDataDropdownTest();

        return $dataDropdown;

    }

    public function getDropDownArgKendo($estado)
    {

        $Bl = new TestBL();

        $dataDropdown = $Bl->getDataDropdownArgTest($estado);

        return $dataDropdown;

    }


    //Test Info Auth

    public function vistaInfoAuth()
    {
        return view('test.vistaInfoAuth');
    }

}

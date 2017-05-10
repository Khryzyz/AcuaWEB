<?php

class TestBL
{

    public function __construct()
    {
    }

    public function getDataGridTest($id)
    {
        $dataGrid = \DB::select('CALL getDataGridTest(?)', array($id));

        return $dataGrid;
    }

    public function getDataDropdownTest()
    {
        $dataDropdown = \DB::select('CALL getDataDropdownTest');

        return $dataDropdown;
    }

    public function getDataDropdownArgTest($estado)
    {
        $dataDropdown = \DB::select('CALL getDataDropdownArgTest(?)',array($estado));

        return $dataDropdown;
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Mike42\Escpos\Printer;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;

class TestPrintController extends Controller
{
    // 
    public function test(Request $request){
        $connector = new WindowsPrintConnector('POS-58');
        $printer = new Printer($connector);

        $printer->setTextSize(1, 2);
        $printer-> text('test');

        // $printer->feed();
        // $printer->setJustification(Printer::JUSTIFY_CENTER);
        // $printer->qrCode('47', Printer::QR_ECLEVEL_L,8);
        // $printer->setJustification(); // Reset
        // $printer->feed(); 

        // $printer->text('123456789 123456789 123456789 12'."\n");   
        $printer->feed(3);
        $printer->cut();
        $printer->close();
    }
}

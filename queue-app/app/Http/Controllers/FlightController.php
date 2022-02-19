<?php

namespace App\Http\Controllers;

use App\Jobs\FlightCsvProcess;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Bus;

class FlightController extends Controller
{
    public function index() {
        return view('upload');
    }

    // public function test() {
    //     return response()->json(['msg' => 'ok']);
    // }

    public function upload() {
        if (request()->has('mycsv')) {
            $data = file((request()->mycsv));

            $chunks = array_chunk($data, 1000);

            // $path = resource_path('temp');
            // foreach ($chunks as $key => $chunk) {
            //     $name = "/tmp{$key}.csv";
            //     file_put_contents($path . $name, $chunk);
            // }

            // $files = glob("$path/*.csv");

            $header = [];

            $batch = Bus::batch([])->dispatch();
            foreach ( $chunks as $key => $chunk ) {
                // $data = array_map( 'str_getcsv', file($chunk));
                $data = array_map( 'str_getcsv', $chunk);

                if ( $key === 0) {
                    $header =  $data[0];
                    unset($data[0]);
                }
                // FlightCsvProcess::dispatch($data, $header);

                $batch->add(new FlightCsvProcess($data, $header));

                // unlink($file);
            }

            // return 'Done!';
            return $batch;
        }

        return 'please upload file!';
    }

    public function batch()
    {
        $batchId = request('id');
        return Bus::findBatch($batchId);
    }
}

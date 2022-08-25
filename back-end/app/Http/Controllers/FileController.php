<?php

namespace App\Http\Controllers;

use App\Models\File as FileModel;
use Dompdf\Exception;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function getFile() {
        try {
            $filename = 'app/multipage.pdf';
            $path = storage_path($filename);

            return response()->make(file_get_contents($path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"'
            ]);

            $file = FileModel::get();
        } catch (Exception $e) {
            return response()->json($e)->setStatusCode(500);
        }
    }

    public function getFileById($id) {
        try {
            $file = FileModel::find($id)->get();
            $filename = ($file[0]->filename);

            $filePath = 'app/' . $filename;
            $path = storage_path($filePath);

            return response()->make(file_get_contents($path), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="'.$filename.'"'
            ]);

            return response()->json($file)->setStatusCode(200);
        } catch (Exception $e) {
            return response()->json($file)->setStatusCode(500);
        }
    }
}

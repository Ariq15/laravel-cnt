<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BiodataController extends Controller
{
    public function create(Request $request)
    {
        // Validasi input data
        $request->validate([
            'name' => 'required|string',
            'fullname' => 'required|string',
            // 'tanggal_lahir' => 'required|date',
            'umur' => 'required|integer',
            // 'hobi_ids' => 'required|array',
            // 'hobi_ids.*' => 'integer|exists:hobis,id',
            // 'kelas_id' => 'required|integer|exists:kelas,id',
            // 'jenis_kelamin' => 'required|in:laki-laki,perempuan',
        ]);

        // Ambil input dari request
        $dataInput = [
            'name' => $request->input('name'),
            'fullname' => $request->input('fullname'),
            // 'tanggal_lahir' => $request->input('tanggal_lahir'),
            'umur' => $request->input('umur'),

            // 'kelas_id' => $request->input('kelas_id'),
            // 'jenis_kelamin' => $request->input('jenis_kelamin'),
        ];

        // Buat biodata baru menggunakan metode create()
        $biodata = Biodata::create($dataInput);

        if ($biodata) {
            return response()->json([
                'status' => true,
                'message' => 'Berhasil terbuat',
                'data' => $biodata // Optional: Mengembalikan data yang baru saja dibuat
            ], 200);
        } else {
            return response()->json([
                'status' => false,
                'message' => 'Gagal terbuat'
            ]);
        }
    }
    public function update(Request $request) {
        if (!$request->input('id')){
            return 'id required ';
        }
        $biodata = Biodata::where('id', $request->input('id')) ->first();
        if(!$biodata){
            return response()->json(['message' => 'biodata not found'],404);
        }
        $data = $request->all();
        $biodata->fill($data);
        $biodata->save();

        return response()->json(['mesaage' => 'user id' . $biodata->id . 'update'],200);
    }
    public function get(Request $request) {
        $id = $request->input('id');
        $biodata = Biodata::select('*');
        if ($id) {
            $biodata->where('id', $request->input('id'));
        }
        $getbio = $biodata->get();
        return $getbio;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\User; // Asegúrate de importar el modelo que estás utilizando

class EncryptionController extends Controller
{
    public function encryptData(Request $request)
    {
        $dataToEncrypt = $request->input('data');

        // Cifrar los datos antes de guardarlos en la base de datos
        $encryptedData = Crypt::encryptString($dataToEncrypt);

        // Guardar los datos cifrados en la base de datos
        $user = new User();
        $user->encrypted_column = $encryptedData;
        $user->save();

        return redirect()->back()->with('success', 'Datos cifrados y guardados exitosamente.');
    }

    public function decryptData($id)
    {
        // Recuperar los datos cifrados de la base de datos
        $user = User::find($id);

        // Descifrar los datos recuperados de la base de datos
        $decryptedData =Crypt::decryptString($user->encrypted_column);

        return view('decrypted_data', ['decryptedData' => $decryptedData]);
    }
}


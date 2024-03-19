<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class cifradocesar extends Controller
{
    public function cifradoCesar1($texto, $desplazamiento) {
        $cifrado = "";
        $longitud = strlen($texto);
        for ($i = 0; $i < $longitud; $i++) {
            if (ctype_alpha($texto[$i])) {
                $mayuscula = ctype_upper($texto[$i]);
                $ascii = ord($texto[$i]);
                $ascii += $desplazamiento;
                if ($mayuscula) {
                    if ($ascii > ord('Z')) {
                        $ascii -= 26;
                    } elseif ($ascii < ord('A')) {
                        $ascii += 26;
                    }
                } else {
                    if ($ascii > ord('z')) {
                        $ascii -= 26;
                    } elseif ($ascii < ord('a')) {
                        $ascii += 26;
                    }
                }
                $cifrado .= chr($ascii);
            } else {
                $cifrado .= $texto[$i];
            }
        }
        return $cifrado;
    }


    public function cifrartexto(Request $request){
        $texto = $request->textocifrar;
        $despla = $request->numerodes;
        $textocifrado = $this->cifradoCesar1($texto,$despla);
        return redirect()->back()->with(compact("textocifrado"));
    }
    public function descifrarCesar($texto, $desplazamiento) {
        $descifrado = "";
        $longitud = strlen($texto);
        for ($i = 0; $i < $longitud; $i++) {
            if (ctype_alpha($texto[$i])) {
                $mayuscula = ctype_upper($texto[$i]);
                $ascii = ord($texto[$i]);
                $ascii -= $desplazamiento;
                if ($mayuscula) {
                    if ($ascii < ord('A')) {
                        $ascii += 26;
                    } elseif ($ascii > ord('Z')) {
                        $ascii -= 26;
                    }
                } else {
                    if ($ascii < ord('a')) {
                        $ascii += 26;
                    } elseif ($ascii > ord('z')) {
                        $ascii -= 26;
                    }
                }
                $descifrado .= chr($ascii);
            } else {
                $descifrado .= $texto[$i];
            }
        }
        return $descifrado;
    }
    public function descifrarTexto(Request $request){
        $texto = $request->textodescifrar;
        $despla = $request->numerodes;
        $textodescifrado =$this->descifrarCesar($texto, $despla);
        return redirect()->back()->with(compact("textodescifrado"));
    }



}













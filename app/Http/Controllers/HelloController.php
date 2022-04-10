<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function index($id='noname', $pass='unknown') {
        return <<<EOF
        <html>
            <head>
                <title>Hello/index</title>
                <style>

                </style>
            </head>
            <body>
                <h1>Index</h1>
                <p>これは、Helloコントローラのindexアクションです </p>
                <ul>
                    <li>ID: {$id}</li>
                    <li>ID: {$pass}</li>
                </ul>
            </body>
        </html>
        EOF;
    }
}

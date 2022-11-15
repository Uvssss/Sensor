<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;
class PythonDataController extends Controller
{
    public function testPythonScript()
{
    $process = new Process();
    $process->run();

    if (!$process->isSuccessful()) {
        throw new ProcessFailedException($process);
    }

    $data = $process->getOutput();

    dd($data);
}
}

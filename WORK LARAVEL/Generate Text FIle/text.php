<?php
// generate text file
use Illuminate\Support\Facades\Storage; // at top of controller
Storage::disk('local')->put('name.txt', $fileData); 
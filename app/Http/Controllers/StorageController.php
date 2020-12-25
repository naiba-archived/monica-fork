<?php

namespace App\Http\Controllers;

use App\Models\Account\Photo;
use App\Models\Contact\Document;
use Illuminate\Support\Facades\Storage;

class StorageController
{
    /**
     * download file authorization
     */
    public function download($folder, $file)
    {
        $accountId = auth()->user()->account_id;
        switch ($folder) {
            case 'photos':
                $flag = Photo::where([
                    ['account_id', '=', $accountId],
                ])->first();
                break;

            case 'documents':
                $flag = Document::where([
                    ['account_id', '=', $accountId],
                ])->first();
                break;
            default:
                $flag = false;
        }
        if (!$flag) {
            abort(404);
        }
        return Storage::disk(config('filesystem.default'))->download($folder . '/' . $file, $flag->original_filename);
    }
}

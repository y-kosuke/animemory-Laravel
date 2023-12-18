<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Aws\S3\S3Client;

class S3Manager extends Controller
{
    public function getPresignedUrl(Request $request)
    {
        $disks = config('filesystems.disks.s3');
        $s3 = new S3Client([
            'version' => 'latest',
            'region' => $disks['region'],
            'credentials' => [
            'key' => $disks['key'],
            'secret' => $disks['secret'],
            ]
        ]);

        // アップロードするファイルの名前
        $fileName = $request->input('file_name');

        // 事前署名付きURLの有効期間
        $expiry = '+30 minutes';

        // 事前署名付きURLを生成
        $cmd = $s3->getCommand('PutObject', [
            'Bucket' => $disks['bucket'],
            'Key'    => "images/" . $fileName,
        ]);

        $presignedUrl = (string)$s3->createPresignedRequest($cmd, $expiry)->getUri();

        // 事前署名付きURLをレスポンスとして返す
        return response()->json(['url' => $presignedUrl]);
    }
}
